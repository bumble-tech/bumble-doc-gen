<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity\Cache;

interface CacheableEntityWrapperInterface
{
    public function getEntityDependencies(): array;

    public function entityCacheIsOutdated(): bool;

    public function reloadEntityDependenciesCache(): void;
}