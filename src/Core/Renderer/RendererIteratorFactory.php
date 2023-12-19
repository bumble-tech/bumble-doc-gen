<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer;

use BumbleDocGen\Console\ProgressBar\ProgressBarFactory;
use BumbleDocGen\Core\Cache\LocalCache\Exception\ObjectNotFoundException;
use BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache;
use BumbleDocGen\Core\Cache\SharedCompressedDocumentFileCache;
use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Logger\Handler\GenerationErrorsHandler;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup;
use BumbleDocGen\Core\Plugin\Event\Renderer\OnGetProjectTemplatesDirs;
use BumbleDocGen\Core\Plugin\PluginEventDispatcher;
use BumbleDocGen\Core\Renderer\Context\Dependency\RendererDependencyFactory;
use BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrapper;
use BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrappersCollection;
use BumbleDocGen\Core\Renderer\Context\RendererContext;
use Monolog\Logger;
use Symfony\Component\Console\Style\OutputStyle;
use Symfony\Component\Finder\Finder;

final class RendererIteratorFactory
{
    private const INTERNAL_CACHING_SYSTEM_VERSION = 2;

    private array $renderedFileNames = [];

    public function __construct(
        private RendererContext $rendererContext,
        private RootEntityCollectionsGroup $rootEntityCollectionsGroup,
        private DocumentedEntityWrappersCollection $documentedEntityWrappersCollection,
        private Configuration $configuration,
        private SharedCompressedDocumentFileCache $sharedCompressedDocumentFileCache,
        private RendererHelper $rendererHelper,
        private RendererDependencyFactory $dependencyFactory,
        private LocalObjectCache $localObjectCache,
        private ProgressBarFactory $progressBarFactory,
        private PluginEventDispatcher $pluginEventDispatcher,
        private OutputStyle $io,
        private Logger $logger,
        private GenerationErrorsHandler $generationErrorsHandler,
    ) {
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getTemplatesWithOutdatedCache(): \Generator
    {
        $pb = $this->progressBarFactory->createStylizedProgressBar();
        $pb->setName('Generating main documentation pages');

        $templatesDir = $this->configuration->getTemplatesDir();
        $event = $this->pluginEventDispatcher->dispatch(new OnGetProjectTemplatesDirs([$templatesDir]));
        $templatesDirs = $event->getTemplatesDirs();
        $finder = Finder::create()
            ->in($templatesDirs)
            ->ignoreDotFiles(true)
            ->ignoreVCSIgnored(true)
            ->reverseSorting()
            ->sortByName()
            ->files();

        $skippedCount = 0;
        foreach ($pb->iterate($finder) as $templateFile) {
            $templateFile = TemplateFile::create(
                $templateFile,
                $this->configuration,
                $this->pluginEventDispatcher
            );
            $pb->setStepDescription("Processing {$templateFile->getRelativeDocPath()} file");

            $errorsBeforeGenerationCount = count($this->generationErrorsHandler->getRecords());

            $relativeTemplateName = $templateFile->getRelativeTemplatePath() ?: $templateFile->getRelativeDocPath();
            $file = $this->prepareDocFileForRendering($templateFile);
            if (!$file) {
                ++$skippedCount;
                $this->moveCachedDataToCurrentData($relativeTemplateName);
                $this->logger->info("Use cached version `{$templateFile->getRealPath()}`");
                continue;
            }
            yield $file;

            $errorsCount = count($this->generationErrorsHandler->getRecords());
            if ($errorsBeforeGenerationCount === $errorsCount) {
                $this->saveContextCacheForSingleDocument($relativeTemplateName);
            }
        }

        $processed = $finder->count() - $skippedCount;
        $this->io->table([], [
            ['Processed documents:', "<options=bold,underscore>{$processed}</>"],
            ['Skipped (without changes):', "<options=bold,underscore>{$skippedCount}</>"],
        ]);
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    private function prepareDocFileForRendering(TemplateFile $templateFile): ?TemplateFile
    {
        $relativeTemplateName = $templateFile->getRelativeTemplatePath() ?: $templateFile->getRelativeDocPath();

        $this->rendererContext->clearDependencies();
        $this->rootEntityCollectionsGroup->clearOperationsLog();

        $this->rendererContext->setCurrentTemplateFilePatch($relativeTemplateName);
        $fileDependency = $this->dependencyFactory->createFileDependency(
            filePath: $templateFile->getRealPath()
        );
        $this->rendererContext->addDependency($fileDependency);

        $this->markFileNameAsRendered($relativeTemplateName);

        if (
            !$this->configuration->useSharedCache() ||
            !$this->isGeneratedDocumentExists($relativeTemplateName) ||
            $this->isInternalCachingVersionChanged() ||
            $this->isConfigurationVersionChanged() ||
            $this->isFilesDependenciesCacheOutdated($relativeTemplateName) ||
            $this->isEntitiesOperationsLogCacheOutdated($relativeTemplateName)
        ) {
            $this->rendererContext->clearDependencies();
            $this->rootEntityCollectionsGroup->clearOperationsLog();
            $this->rendererContext->setCurrentTemplateFilePatch($relativeTemplateName);
            $fileDependency = $this->dependencyFactory->createFileDependency(
                filePath: $templateFile->getRealPath()
            );
            $this->rendererContext->addDependency($fileDependency);
            return $templateFile;
        }
        return null;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getDocumentedEntityWrappersWithOutdatedCache(): \Generator
    {
        $pb = $this->progressBarFactory->createStylizedProgressBar();
        $pb->setName('Generating entities documentation');

        $skippedCount = 0;
        foreach ($pb->iterate($this->documentedEntityWrappersCollection) as $entityWrapper) {
            $pb->setStepDescription("Processing `{$entityWrapper->getEntityName()}` entity");
            if (!$entityWrapper->getDocumentTransformableEntity()->isEntityDataCanBeLoaded()) {
                continue;
            }

            /** @var DocumentedEntityWrapper $entityWrapper */
            $this->rendererContext->clearDependencies();
            $this->rootEntityCollectionsGroup->clearOperationsLog();

            $errorsBeforeGenerationCount = count($this->generationErrorsHandler->getRecords());

            $this->rendererContext->setCurrentDocumentedEntityWrapper($entityWrapper);
            $this->markFileNameAsRendered($entityWrapper->getDocUrl());
            $filesDependenciesKey = "{$entityWrapper->getEntityName()}_{$entityWrapper->getParentDocFilePath()}";
            if (
                !$this->configuration->useSharedCache() ||
                !$this->isGeneratedEntityDocumentExists($entityWrapper) ||
                $this->isInternalCachingVersionChanged() ||
                $this->isConfigurationVersionChanged() ||
                $entityWrapper->getDocumentTransformableEntity()->isEntityCacheOutdated() ||
                $this->isFilesDependenciesCacheOutdated($filesDependenciesKey) ||
                $this->isEntityRelationsCacheOutdated($entityWrapper) ||
                $this->isEntitiesOperationsLogCacheOutdated($entityWrapper->getEntityName())
            ) {
                $this->rendererContext->clearDependencies();
                $this->rootEntityCollectionsGroup->clearOperationsLog();
                yield $entityWrapper;
            } else {
                $this->moveCachedDataToCurrentData($entityWrapper->getParentDocFilePath(), $entityWrapper->getEntityName());
                $this->logger->info("Use cached version `{$this->configuration->getOutputDir()}{$entityWrapper->getDocUrl()}`");
                ++$skippedCount;
                continue;
            }

            $errorsCount = count($this->generationErrorsHandler->getRecords());
            if ($errorsBeforeGenerationCount === $errorsCount) {
                $this->saveContextCacheForSingleDocument(
                    $entityWrapper->getEntityName(),
                    $entityWrapper->getParentDocFilePath()
                );
            }
            $this->rendererContext->clearDependencies();
            $this->rootEntityCollectionsGroup->clearOperationsLog();
        }
        $this->sharedCompressedDocumentFileCache->set(
            'entities_relations',
            $this->documentedEntityWrappersCollection->getDocumentedEntitiesRelations()
        );
        $this->sharedCompressedDocumentFileCache->set(
            'config_hash',
            $this->configuration->getConfigurationVersion()
        );
        $this->sharedCompressedDocumentFileCache->set(
            'internal_caching_system_version',
            self::INTERNAL_CACHING_SYSTEM_VERSION
        );

        $processed = count($this->documentedEntityWrappersCollection) - $skippedCount;
        $this->io->table([], [
            ['Processed entities:', "<options=bold,underscore>{$processed}</>"],
            ['Skipped (without changes):', "<options=bold,underscore>{$skippedCount}</>"],
        ]);
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getFilesToRemove(): \Generator
    {
        $outputFolder = $this->configuration->getOutputDir();
        $finder = Finder::create()
            ->in($outputFolder)
            ->files();

        $this->markFileNameAsRendered($this->sharedCompressedDocumentFileCache->getCacheFileName());
        $this->markFileNameAsRendered('/.gitattributes');

        foreach ($finder as $docFile) {
            $relativeFilePath = str_replace(
                $this->configuration->getOutputDir(),
                '',
                $docFile->getRealPath()
            );
            if (array_key_exists($relativeFilePath, $this->renderedFileNames)) {
                continue;
            }
            yield $docFile;
        }

        // check empty directories
        $finder = Finder::create()
            ->in($outputFolder)
            ->ignoreDotFiles(true)
            ->ignoreUnreadableDirs()
            ->directories();

        $dirs = [];
        foreach ($finder as $dir) {
            if (!Finder::create()->in($dir->getRealPath())->files()->count()) {
                $dirs[] = $dir;
            }
        }
        yield from $dirs;
    }

    private function isInternalCachingVersionChanged(): bool
    {
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, '');
        } catch (ObjectNotFoundException) {
        }
        $cachedInternalCachingSystemVersion = $this->sharedCompressedDocumentFileCache->get('internal_caching_system_version');
        $isConfigChanged = self::INTERNAL_CACHING_SYSTEM_VERSION !== $cachedInternalCachingSystemVersion;
        $this->localObjectCache->cacheMethodResult(__METHOD__, '', $isConfigChanged);
        return $isConfigChanged;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    private function markFileNameAsRendered(string $docFileName): void
    {
        $docFileName = str_replace([
            '.twig',
            $this->configuration->getOutputDir()
        ], '', $docFileName);
        $this->renderedFileNames[$docFileName] = $docFileName;
    }

    private function isConfigurationVersionChanged(): bool
    {
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, '');
        } catch (ObjectNotFoundException) {
        }
        $configHash = $this->configuration->getConfigurationVersion();
        $cachedConfigHash = $this->sharedCompressedDocumentFileCache->get('config_hash');
        $isConfigChanged = $configHash !== $cachedConfigHash;
        $this->localObjectCache->cacheMethodResult(__METHOD__, '', $isConfigChanged);
        return $isConfigChanged;
    }

    private function isEntityRelationsCacheOutdated(DocumentedEntityWrapper $entityWrapper): bool
    {
        $cachedEntitiesRelations = $this->sharedCompressedDocumentFileCache->get('entities_relations', []);
        if (!array_key_exists($entityWrapper->getParentDocFilePath(), $cachedEntitiesRelations)) {
            return true;
        }

        return false;
    }

    private function isEntitiesOperationsLogCacheOutdated(string $templateFileName): bool
    {
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $templateFileName);
        } catch (ObjectNotFoundException) {
        }
        $cachedOperationsLog = $this->sharedCompressedDocumentFileCache->get(
            $this->getOperationsLogCacheKey($templateFileName)
        );
        if (is_null($cachedOperationsLog)) {
            $isEntitiesOperationsLogCacheOutdated = true;
        } else {
            $isEntitiesOperationsLogCacheOutdated = $this->rootEntityCollectionsGroup->isFoundEntitiesOperationsLogCacheOutdated($cachedOperationsLog);
        }
        $this->localObjectCache->cacheMethodResult(__METHOD__, $templateFileName, $isEntitiesOperationsLogCacheOutdated);
        return $isEntitiesOperationsLogCacheOutdated;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    private function isGeneratedDocumentExists(string $templateFileName): bool
    {
        $outputDir = $this->configuration->getOutputDir();
        if (str_ends_with($templateFileName, '.twig')) {
            $templateFileName = str_replace('.twig', '', $templateFileName);
        }
        return file_exists("{$outputDir}{$templateFileName}");
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    private function isGeneratedEntityDocumentExists(DocumentedEntityWrapper $entityWrapper): bool
    {
        $filePatch = "{$this->configuration->getOutputDir()}{$entityWrapper->getDocUrl()}";
        return file_exists($filePatch);
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    private function isFilesDependenciesCacheOutdated(string $templateFileName): bool
    {
        $cachedFilesDependencies = $this->sharedCompressedDocumentFileCache->get(
            $this->getFilesDependenciesCacheKey($templateFileName)
        );
        if (is_null($cachedFilesDependencies)) {
            return true;
        }
        foreach ($cachedFilesDependencies as $cachedFilesDependency) {
            if (!is_object($cachedFilesDependency) || $cachedFilesDependency->isChanged($this->rendererHelper)) {
                return true;
            }
        }
        return false;
    }

    private function moveCachedDataToCurrentData(string $templateFileName, ?string $entityName = null): void
    {
        $cachedEntitiesRelations = $this->sharedCompressedDocumentFileCache->get('entities_relations', []);
        $entitiesRelations = $cachedEntitiesRelations[$templateFileName][$entityName] ?? [];
        foreach ($entitiesRelations as $entityData) {
            $entityName = $entityData['entity_name'];
            $collectionName = $entityData['collection_name'];
            $entity = $this->rootEntityCollectionsGroup->get($collectionName)->getLoadedOrCreateNew($entityName, true);
            $this->documentedEntityWrappersCollection->createAndAddDocumentedEntityWrapper($entity);
        }
    }

    private function saveContextCacheForSingleDocument(string $docKey, ?string $namespace = null): void
    {
        $this->sharedCompressedDocumentFileCache->set(
            $this->getOperationsLogCacheKey($docKey),
            $this->rootEntityCollectionsGroup->getOperationsLogWithoutDuplicates()
        );

        $filesDependenciesKey = $namespace ? "{$docKey}_{$namespace}" : $docKey;
        $this->sharedCompressedDocumentFileCache->set(
            $this->getFilesDependenciesCacheKey($filesDependenciesKey),
            $this->rendererContext->getDependencies()
        );
    }

    private function getOperationsLogCacheKey(string $key): string
    {
        return "operations_log_{$key}";
    }

    private function getFilesDependenciesCacheKey(string $key): string
    {
        return "files_dependencies_{$key}";
    }
}
