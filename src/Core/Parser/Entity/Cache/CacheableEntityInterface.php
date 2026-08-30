<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity\Cache;

use BumbleDocGen\Core\Parser\Entity\EntityInterface;

interface CacheableEntityInterface extends EntityInterface
{
    /**
     * Get the cache key
     *
     * @internal
     */
    public function getCacheKey(): string;

    /**
     * Checking if the entity cache is out of date
     *
     * @internal
     */
    public function isEntityCacheOutdated(): bool;

    /**
     * Checking if the current entity file can be loaded
     *
     * @internal
     */
    public function isEntityFileCanBeLoad(): bool;

    /**
     * Checking if the local entity cache is out of date
     *
     * @internal
     */
    public function isEntityDataCacheOutdated(): bool;

    /**
     * Update entity dependency cache
     *
     * @internal
     */
    public function reloadEntityDependenciesCache(): array;

    /**
     * Delete current entity cache that was not used the last time documentation was generated
     *
     * @internal
     */
    public function removeNotUsedEntityDataCache(): void;
}
