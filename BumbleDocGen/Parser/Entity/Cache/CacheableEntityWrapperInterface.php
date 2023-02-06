<?php

namespace BumbleDocGen\Parser\Entity\Cache;

interface CacheableEntityWrapperInterface
{
    public function getEntityDependencies(): array;

    public function entityCacheIsOutdated(): bool;

    public function reloadEntityDependenciesCache(): void;
}