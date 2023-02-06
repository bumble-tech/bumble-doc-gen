<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\Entity\Cache;

use BumbleDocGen\ConfigurationInterface;

/**
 * @internal
 */
final class EntityCacheStorageHelper
{
    private static array $cache = [];

    public static function getAllCacheValues(): array
    {
        return self::$cache;
    }

    public static function getCacheValues(string $cacheKey): ?array
    {
        return self::$cache[$cacheKey] ?? null;
    }

    public static function setCacheValues(string $cacheKey, array $values): void
    {
        foreach ($values as $key => $value) {
            self::addValueToCache($cacheKey, $key, $value);
        }
    }

    public static function getCacheValue(string $cacheKey, string $itemKey): mixed
    {
        return self::$cache[$cacheKey][$itemKey] ?? null;
    }

    public static function addValueToCache(string $cacheKey, string $itemKey, mixed $value): void
    {
        self::$cache[$cacheKey][$itemKey] = $value;
    }

    public static function saveCache(ConfigurationInterface $configuration): void
    {
        $cacheItemPool = $configuration->getEntityCacheItemPool();
        foreach (EntityCacheStorageHelper::getAllCacheValues() as $cacheKey => $cacheData) {
            $cacheItem = $cacheItemPool->getItem($cacheKey);
            $cacheItem->set($cacheData);
            $cacheItem->expiresAfter(604800);
            $cacheItemPool->saveDeferred($cacheItem);
        }
        $cacheItemPool->commit();
    }
}
