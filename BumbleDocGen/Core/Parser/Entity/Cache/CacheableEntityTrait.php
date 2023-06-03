<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity\Cache;

use BumbleDocGen\Core\Cache\EntityCacheItemPool;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use DI\Attribute\Inject;
use Psr\Cache\InvalidArgumentException;

trait CacheableEntityTrait
{
    private string $cacheVersion = 'v5';
    private static string $dataKey = 'd';
    private static string $expiresTimeKey = 'e';

    private bool $isCacheChanged = false;

    #[Inject] private EntityCacheItemPool $entityCacheItemPool;
    #[Inject] private EntityCacheStorageHelper $entityCacheStorageHelper;

    abstract public function getCacheKey(): string;

    abstract public function entityCacheIsOutdated(): bool;

    private function getVersionedCacheKey(): string
    {
        return "{$this->cacheVersion}_{$this->getCacheKey()}";
    }

    /**
     * @throws InvalidConfigurationParameterException
     * @throws InvalidArgumentException
     */
    private function getEntityCacheValues(): array
    {
        $cacheKey = $this->getVersionedCacheKey();
        $cacheValues = $this->entityCacheStorageHelper->getCacheValues($cacheKey);
        if (is_null($cacheValues)) {
            $cacheValues = [];
            if (
                $this->entityCacheItemPool->hasItem($cacheKey) &&
                !$this->entityCacheIsOutdated()
            ) {
                $cacheValues = $this->entityCacheItemPool->getItem($cacheKey)->get();
                $time = time();
                foreach ($cacheValues as $key => $cacheValue) {
                    if (!isset($cacheValue[self::$expiresTimeKey]) || $cacheValue[self::$expiresTimeKey] < $time) {
                        unset($cacheValues[$key]);
                    }
                }
            }
            $this->entityCacheStorageHelper->setCacheValues($cacheKey, $cacheValues);
        }
        return $cacheValues;
    }

    /**
     * @throws InvalidConfigurationParameterException
     * @throws InvalidArgumentException
     */
    final protected function getEntityCacheValue(string $key): mixed
    {
        $cacheValues = $this->getEntityCacheValues();
        return $cacheValues[$key][self::$dataKey] ?? null;
    }

    /**
     * @throws InvalidConfigurationParameterException
     * @throws InvalidArgumentException
     */
    final protected function hasEntityCacheValue(string $key): bool
    {
        $cacheValues = $this->getEntityCacheValues();
        return array_key_exists($key, $cacheValues) && is_array($cacheValues[$key]) && array_key_exists(self::$dataKey, $cacheValues[$key]);
    }

    final protected function addEntityValueToCache(string $key, mixed $value, int $cacheExpiresAfter = 604800): void
    {
        $this->isCacheChanged = true;
        $cacheKey = $this->getVersionedCacheKey();
        $this->entityCacheStorageHelper->addValueToCache($cacheKey, $key, [
            self::$dataKey => $value,
            self::$expiresTimeKey => time() + $cacheExpiresAfter,
        ]);
    }

    final public function isEntityDataCacheOutdated(): bool
    {
        return $this->isCacheChanged;
    }
}
