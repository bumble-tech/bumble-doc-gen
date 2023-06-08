<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity\Cache;

use BumbleDocGen\Core\Cache\EntityCacheItemPool;
use Psr\Cache\InvalidArgumentException;

/**
 * @internal
 */
final class EntityCacheStorageHelper
{
    private array $cache = [];
    private static string $dataKey = 'd';
    private static string $expiresTimeKey = 'e';

    public function __construct(private EntityCacheItemPool $cacheItemPool)
    {
    }

    /**
     * @throws InvalidArgumentException
     */
    public function loadCacheValuesFromStorage(string $cacheKey): array
    {
        $cacheValues = [];
        if ($this->cacheItemPool->hasItem($cacheKey)) {
            $cacheValues = $this->cacheItemPool->getItem($cacheKey)->get();
            $time = time();
            foreach ($cacheValues as $key => $cacheValue) {
                if (!isset($cacheValue[self::$expiresTimeKey]) || $cacheValue[self::$expiresTimeKey] < $time) {
                    unset($cacheValues[$key]);
                }
            }
        }
        $this->setCacheValues($cacheKey, $cacheValues);
        return $cacheValues;
    }

    public function getAllCacheValues(): array
    {
        return $this->cache;
    }

    public function getCacheValues(string $cacheKey): ?array
    {
        return $this->cache[$cacheKey] ?? null;
    }

    public function resetAllCacheValues(string $cacheKey): void
    {
        $this->cache[$cacheKey] = [];
    }

    public function setCacheValues(string $cacheKey, array $values): void
    {
        foreach ($values as $key => $value) {
            $this->addValueToCache($cacheKey, $key, $value);
        }
    }

    public function addValueToCache(string $cacheKey, string $itemKey, mixed $value): void
    {
        $this->cache[$cacheKey][$itemKey] = $value;
    }

    /**
     * @throws InvalidArgumentException
     */
    public function saveCache(): void
    {
        foreach ($this->getAllCacheValues() as $cacheKey => $cacheData) {
            $cacheItem = $this->cacheItemPool->getItem($cacheKey);
            $cacheItem->set($cacheData);
            $cacheItem->expiresAfter(604800);
            $this->cacheItemPool->saveDeferred($cacheItem);
        }
        $this->cacheItemPool->commit();
    }
}
