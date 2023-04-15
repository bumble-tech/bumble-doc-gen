<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer;

use BumbleDocGen\Core\Cache\SharedCompressedDocumentFileCache;
use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup;
use BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrapper;
use BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrappersCollection;
use BumbleDocGen\Core\Renderer\Context\RendererContext;
use Monolog\Logger;
use Symfony\Component\Finder\Finder;

final class RendererIterator
{
    private array $renderedFileNames = [];

    public function __construct(
        private RendererContext                    $renderContext,
        private RootEntityCollectionsGroup         $rootEntityCollectionsGroup,
        private DocumentedEntityWrappersCollection $documentedEntityWrappersCollection,
        private Configuration                      $configuration,
        private SharedCompressedDocumentFileCache  $sharedCompressedDocumentFileCache,
        private RendererHelper                     $renderHelper,
        private Logger                             $logger
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
            $this->renderContext->clearFilesDependencies();
            $this->rootEntityCollectionsGroup->clearOperationsLog();

            $templateFileName = str_replace($templateFolder, '', $templateFile->getRealPath());
            $this->renderContext->setCurrentTemplateFilePatch($templateFileName);
            $this->renderContext->addFileDependency($templateFile->getRealPath());

            $this->markFileNameAsRendered($templateFileName);

            if (
                !$this->isGeneratedDocumentExists($templateFileName) ||
                $this->isFilesDependenciesCacheOutdated($templateFileName) ||
                $this->isEntitiesOperationsLogCacheOutdated($templateFileName)
            ) {
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
                $this->renderContext->getFilesDependencies()
            );
        }
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getDocumentedEntityWrappersWithOutdatedCache(): \Generator
    {
        foreach ($this->documentedEntityWrappersCollection as $entityWrapper) {
            /** @var DocumentedEntityWrapper $entityWrapper */
            $this->renderContext->clearFilesDependencies();
            $this->rootEntityCollectionsGroup->clearOperationsLog();

            $this->renderContext->setCurrentDocumentedEntityWrapper($entityWrapper);

            $this->markFileNameAsRendered($entityWrapper->getDocUrl());

            if (
                !$this->isGeneratedEntityDocumentExists($entityWrapper) ||
                $entityWrapper->getDocumentTransformableEntity()->entityCacheIsOutdated() ||
                $this->isFilesDependenciesCacheOutdated($entityWrapper->getEntityName()) ||
                $this->isEntityRelationsCacheOutdated($entityWrapper) ||
                $this->isEntitiesOperationsLogCacheOutdated($entityWrapper->getEntityName())
            ) {
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
                $this->getFilesDependenciesCacheKey($entityWrapper->getEntityName()),
                $this->renderContext->getFilesDependencies()
            );
        }
        $this->sharedCompressedDocumentFileCache->set(
            'entities_relations',
            $this->documentedEntityWrappersCollection->getDocumentedEntitiesRelations()
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
        $cachedOperationsLog = $this->sharedCompressedDocumentFileCache->get(
            $this->getOperationsLogCacheKey($templateFileName)
        );
        if (is_null($cachedOperationsLog)) {
            return true;
        }

        return $this->rootEntityCollectionsGroup->isFoundEntitiesOperationsLogCacheOutdated($cachedOperationsLog);
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
        foreach ($cachedFilesDependencies as $fileNameTemplate => $fileHash) {
            $fileName = $this->renderHelper->fileInternalLinkToFilePath($fileNameTemplate);
            if (md5_file($fileName) !== $fileHash) {
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
            $entity = $this->rootEntityCollectionsGroup->get($collectionName)->getLoadedOrCreateNew($entityName);
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
