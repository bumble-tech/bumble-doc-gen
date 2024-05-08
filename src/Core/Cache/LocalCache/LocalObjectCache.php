<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Cache\LocalCache;

use BumbleDocGen\Core\Cache\LocalCache\Exception\ObjectNotFoundException;

final class LocalObjectCache
{
    private array $cache = [];

    public function cacheMethodResult(string $methodKey, string $objectId, mixed $methodResult): void
    {
        $this->cache[$methodKey][$objectId] = $methodResult;
    }

    /**
     * @throws ObjectNotFoundException
     */
    public function getMethodCachedResult(string $methodKey, string $objectId): mixed
    {
        if (!array_key_exists($methodKey, $this->cache) || !array_key_exists($objectId, $this->cache[$methodKey])) {
            throw new ObjectNotFoundException();
        }
        return $this->cache[$methodKey][$objectId];
    }

    public function clear(): void
    {
        $this->cache = [];
    }
}
