<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity\Cache;

interface CacheableEntityInterface
{
    public function getObjectId(): string;

    public function getCacheKey(): string;

    public function entityCacheIsOutdated(): bool;

    public function isEntityFileCanBeLoad(): bool;

    public function isEntityDataCacheOutdated(): bool;

    public function reloadEntityDependenciesCache(): array;

    public function removeNotUsedEntityDataCache(): void;
}
