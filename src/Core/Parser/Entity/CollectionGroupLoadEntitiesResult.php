<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity;

use BumbleDocGen\LanguageHandler\Php\PhpHandler;

final class CollectionGroupLoadEntitiesResult
{
    /**
     * @var array<class-string<PhpHandler>, CollectionLoadEntitiesResult>
     */
    private array $collectionLoadEntitiesResults = [];

    public function addResult(string $collectionName, CollectionLoadEntitiesResult $collectionLoadEntitiesResult): void
    {
        $this->collectionLoadEntitiesResults[$collectionName] = $collectionLoadEntitiesResult;
    }

    public function getSummary(): CollectionLoadEntitiesResult
    {
        $processedFilesCount = 0;
        $processedEntitiesCount = 0;
        $skippedEntitiesCount = 0;
        $entitiesAddedByPluginsCount = 0;
        $totalAddedEntities = 0;
        foreach ($this->collectionLoadEntitiesResults as $collectionLoadEntitiesResult) {
            $processedFilesCount += $collectionLoadEntitiesResult->getProcessedFilesCount();
            $processedEntitiesCount += $collectionLoadEntitiesResult->getProcessedEntitiesCount();
            $skippedEntitiesCount += $collectionLoadEntitiesResult->getSkippedEntitiesCount();
            $entitiesAddedByPluginsCount += $collectionLoadEntitiesResult->getEntitiesAddedByPluginsCount();
            $totalAddedEntities += $collectionLoadEntitiesResult->getTotalAddedEntities();
        }

        return new CollectionLoadEntitiesResult(
            $processedFilesCount,
            $processedEntitiesCount,
            $skippedEntitiesCount,
            $entitiesAddedByPluginsCount,
            $totalAddedEntities
        );
    }
}
