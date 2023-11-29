<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity;

final class CollectionLoadEntitiesResult
{
    public function __construct(
        private int $processedFilesCount,
        private int $processedEntitiesCount,
        private int $skippedEntitiesCount,
        private int $entitiesAddedByPluginsCount,
        private int $totalAddedEntities,
    ) {
    }

    public function getEntitiesAddedByPluginsCount(): int
    {
        return $this->entitiesAddedByPluginsCount;
    }

    public function getProcessedEntitiesCount(): int
    {
        return $this->processedEntitiesCount;
    }

    public function getProcessedFilesCount(): int
    {
        return $this->processedFilesCount;
    }

    public function getSkippedEntitiesCount(): int
    {
        return $this->skippedEntitiesCount;
    }

    public function getTotalAddedEntities(): int
    {
        return $this->totalAddedEntities;
    }
}
