<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer;

use BumbleDocGen\Core\Cache\LocalCache\Exception\ObjectNotFoundException;
use BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache;
use BumbleDocGen\Core\Cache\SharedCompressedDocumentFileCache;
use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\ConfigurationParameterBag;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup;
use BumbleDocGen\Core\Renderer\Context\Dependency\RendererDependencyFactory;
use BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrapper;
use BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrappersCollection;
use BumbleDocGen\Core\Renderer\Context\RendererContext;
use Monolog\Logger;
use Symfony\Component\Finder\Finder;

final class RendererIteratorFactory
{
    private const INTERNAL_CACHING_SYSTEM_VERSION = 1;

    private array $renderedFileNames = [];

    public function __construct(
        private RendererContext                    $rendererContext,
        private RootEntityCollectionsGroup         $rootEntityCollectionsGroup,
        private DocumentedEntityWrappersCollection $documentedEntityWrappersCollection,
        private Configuration                      $configuration,
        private ConfigurationParameterBag          $configurationParameterBag,
        private SharedCompressedDocumentFileCache  $sharedCompressedDocumentFileCache,
        private RendererHelper                     $rendererHelper,
        private RendererDependencyFactory          $dependencyFactory,
        private LocalObjectCache                   $localObjectCache,
        private Logger                             $logger,
    )
    {
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getTemplatesWithOutdatedCache(): \Generator
    {
        $templateFolder = $this->configuration->getTemplatesDir();
        $finder = Finder::create()
            ->in($templateFolder)
            ->ignoreDotFiles(true)
            ->ignoreVCSIgnored(true)
            ->reverseSorting()
            ->sortByName()
            ->files();

        foreach ($finder as $templateFile) {
            $this->rendererContext->clearDependencies();
            $this->rootEntityCollectionsGroup->clearOperationsLog();

            $templateFileName = str_replace($templateFolder, '', $templateFile->getRealPath());
            $this->rendererContext->setCurrentTemplateFilePatch($templateFileName);
            $fileDependency = $this->dependencyFactory->createFileDependency(
                filePath: $templateFile->getRealPath()
            );
            $this->rendererContext->addDependency($fileDependency);

            $this->markFileNameAsRendered($templateFileName);

            if (
                !$this->configuration->useSharedCache() ||
                !$this->isGeneratedDocumentExists($templateFileName) ||
                $this->isInternalCachingVersionChanged() ||
                $this->isConfigurationVersionChanged() ||
                $this->isFilesDependenciesCacheOutdated($templateFileName) ||
                $this->isEntitiesOperationsLogCacheOutdated($templateFileName)
            ) {
                $this->rendererContext->clearDependencies();
                $this->rootEntityCollectionsGroup->clearOperationsLog();
                $this->rendererContext->setCurrentTemplateFilePatch($templateFileName);
                $fileDependency = $this->dependencyFactory->createFileDependency(
                    filePath: $templateFile->getRealPath()
                );
                $this->rendererContext->addDependency($fileDependency);
                yield $templateFile;
            } else {
                $this->moveCachedDataToCurrentData($templateFileName);
                $this->logger->info("Use cached version `{$templateFile->getRealPath()}`");
                continue;
            }

            $this->sharedCompressedDocumentFileCache->set(
                $this->getOperationsLogCacheKey($templateFileName),
                $this->rootEntityCollectionsGroup->getOperationsLogWithoutDuplicates()
            );

            $this->sharedCompressedDocumentFileCache->set(
                $this->getFilesDependenciesCacheKey($templateFileName),
                $this->rendererContext->getDependencies()
            );
        }
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getDocumentedEntityWrappersWithOutdatedCache(): \Generator
    {
        foreach ($this->documentedEntityWrappersCollection as $entityWrapper) {
            if (!$entityWrapper->getDocumentTransformableEntity()->entityDataCanBeLoaded()) {
                continue;
            }

            /** @var DocumentedEntityWrapper $entityWrapper */
            $this->rendererContext->clearDependencies();
            $this->rootEntityCollectionsGroup->clearOperationsLog();

            $this->rendererContext->setCurrentDocumentedEntityWrapper($entityWrapper);

            $this->markFileNameAsRendered($entityWrapper->getDocUrl());

            $filesDependenciesKey = "{$entityWrapper->getEntityName()}_{$entityWrapper->getInitiatorFilePath()}";
            if (
                !$this->configuration->useSharedCache() ||
                !$this->isGeneratedEntityDocumentExists($entityWrapper) ||
                $this->isInternalCachingVersionChanged() ||
                $this->isConfigurationVersionChanged() ||
                $entityWrapper->getDocumentTransformableEntity()->entityCacheIsOutdated() ||
                $this->isFilesDependenciesCacheOutdated($filesDependenciesKey) ||
                $this->isEntityRelationsCacheOutdated($entityWrapper) ||
                $this->isEntitiesOperationsLogCacheOutdated($entityWrapper->getEntityName())
            ) {
                $this->rendererContext->clearDependencies();
                $this->rootEntityCollectionsGroup->clearOperationsLog();
                yield $entityWrapper;
            } else {
                $this->moveCachedDataToCurrentData($entityWrapper->getInitiatorFilePath(), $entityWrapper->getEntityName());
                $this->logger->info("Use cached version `{$this->configuration->getOutputDir()}{$entityWrapper->getDocUrl()}`");
                continue;
            }

            $this->sharedCompressedDocumentFileCache->set(
                $this->getOperationsLogCacheKey($entityWrapper->getEntityName()),
                $this->rootEntityCollectionsGroup->getOperationsLogWithoutDuplicates()
            );

            $this->sharedCompressedDocumentFileCache->set(
                $this->getFilesDependenciesCacheKey($filesDependenciesKey),
                $this->rendererContext->getDependencies()
            );
            $this->rendererContext->clearDependencies();
            $this->rootEntityCollectionsGroup->clearOperationsLog();
        }
        $this->sharedCompressedDocumentFileCache->set(
            'entities_relations',
            $this->documentedEntityWrappersCollection->getDocumentedEntitiesRelations()
        );
        $this->sharedCompressedDocumentFileCache->set(
            'config_hash',
            md5(serialize($this->configurationParameterBag->getAll(false)))
        );
        $this->sharedCompressedDocumentFileCache->set(
            'internal_caching_system_version',
            self::INTERNAL_CACHING_SYSTEM_VERSION
        );
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
        $configHash = md5(serialize($this->configurationParameterBag->getAll(false)));
        $cachedConfigHash = $this->sharedCompressedDocumentFileCache->get('config_hash');
        $isConfigChanged = $configHash !== $cachedConfigHash;
        $this->localObjectCache->cacheMethodResult(__METHOD__, '', $isConfigChanged);
        return $isConfigChanged;
    }

    private function isEntityRelationsCacheOutdated(DocumentedEntityWrapper $entityWrapper): bool
    {
        $cachedEntitiesRelations = $this->sharedCompressedDocumentFileCache->get('entities_relations', []);
        if (!array_key_exists($entityWrapper->getInitiatorFilePath(), $cachedEntitiesRelations)) {
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

    private function getOperationsLogCacheKey(string $key): string
    {
        return "operations_log_{$key}";
    }

    private function getFilesDependenciesCacheKey(string $key): string
    {
        return "files_dependencies_{$key}";
    }
}
