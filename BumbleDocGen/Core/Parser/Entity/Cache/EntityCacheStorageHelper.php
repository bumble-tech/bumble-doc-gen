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
    private array $usedCacheItems = [];
    private static string $dataKey = 'd';
    private static string $expiresTimeKey = 'e';

    public function __construct(private EntityCacheItemPool $cacheItemPool)
    {
    }

    /**
     * @throws InvalidArgumentException
     */
    private function initCacheByKey(string $cacheKey): void
    {
        $cacheValues = $this->cache[$cacheKey] ?? null;
        if (is_null($cacheValues)) {
            $this->cache[$cacheKey] = [];
            $cacheValues = [];
            if ($this->cacheItemPool->hasItem($cacheKey)) {
                $cacheValues = $this->cacheItemPool->getItem($cacheKey)->get();
            }
            $time = time();
            foreach ($cacheValues as $key => $cacheValue) {
                if (!isset($cacheValue[self::$expiresTimeKey]) || $cacheValue[self::$expiresTimeKey] < $time) {
                    unset($cacheValues[$key]);
                } else {
                    $this->cache[$cacheKey][$key] = $cacheValue;
                }
            }
        }
    }

    /**
     * @throws InvalidArgumentException
     */
    public function getItemValues(string $cacheKey): array
    {
        $this->initCacheByKey($cacheKey);
        return $this->cache[$cacheKey];
    }

    /**
     * @throws InvalidArgumentException
     */
    public function addItemValueToCache(string $cacheKey, string $itemKey, mixed $value, int $expiresAfter): void
    {
        $this->initCacheByKey($cacheKey);
        $this->usedCacheItems[$cacheKey][$itemKey] = 1;
        $this->cache[$cacheKey][$itemKey] = [
            self::$dataKey => $value,
            self::$expiresTimeKey => time() + $expiresAfter,
        ];
    }

    /**
     * @throws InvalidArgumentException
     */
    public function getItemValueFromCache(string $cacheKey, string $itemKey): mixed
    {
        $cacheValues = $this->getItemValues($cacheKey);
        $this->usedCacheItems[$cacheKey][$itemKey] = 1;
        return $cacheValues[$itemKey][self::$dataKey] ?? null;
    }

    public function removeItemValueFromCache(string $cacheKey, string $itemKey): void
    {
        unset($this->cache[$cacheKey][$itemKey]);
    }

    public function getUsedCacheItemsKeys(string $cacheKey): array
    {
        return $this->usedCacheItems[$cacheKey] ?? [];
    }

    /**
     * @throws InvalidArgumentException
     */
    public function saveCache(): void
    {
        foreach ($this->cache as $cacheKey => $cacheData) {
            $cacheItem = $this->cacheItemPool->getItem($cacheKey);
            $cacheItem->set($cacheData);
            $cacheItem->expiresAfter(604800);
            $this->cacheItemPool->saveDeferred($cacheItem);
        }
        $this->cacheItemPool->commit();
    }
}
