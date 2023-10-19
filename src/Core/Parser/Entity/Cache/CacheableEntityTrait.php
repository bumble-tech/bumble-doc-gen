<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity\Cache;

use DI\Attribute\Inject;
use Psr\Cache\InvalidArgumentException;

trait CacheableEntityTrait
{
    #[Inject] private EntityCacheStorageHelper $entityCacheStorageHelper;

    private string $cacheVersion = 'v7';
    private bool $isCacheChanged = false;

    abstract public function getCacheKey(): string;

    abstract public function entityCacheIsOutdated(): bool;

    private function getVersionedCacheKey(): string
    {
        return "{$this->cacheVersion}_{$this->getCacheKey()}";
    }

    /**
     * @throws InvalidArgumentException
     */
    protected function getEntityCacheValue(string $key): mixed
    {
        return $this->entityCacheStorageHelper->getItemValueFromCache($this->getVersionedCacheKey(), $key);
    }

    /**
     * @throws InvalidArgumentException
     */
    protected function hasEntityCacheValue(string $key): bool
    {
        $cacheValues = $this->entityCacheStorageHelper->getItemValues($this->getVersionedCacheKey());
        return array_key_exists($key, $cacheValues) && is_array($cacheValues[$key]) && $cacheValues[$key];
    }

    /**
     * @throws InvalidArgumentException
     */
    protected function addEntityValueToCache(string $key, mixed $value, int $cacheExpiresAfter = 604800): void
    {
        $this->isCacheChanged = true;
        $this->entityCacheStorageHelper->addItemValueToCache(
            $this->getVersionedCacheKey(),
            $key,
            $value,
            $cacheExpiresAfter
        );
    }

    /**
     * @throws InvalidArgumentException
     */
    public function isEntityDataCacheOutdated(): bool
    {
        $cacheKey = $this->getVersionedCacheKey();
        $values = $this->entityCacheStorageHelper->getItemValues($cacheKey);
        $usedCacheItemsKeys = $this->entityCacheStorageHelper->getUsedCacheItemsKeys($cacheKey);
        $isCacheChanged = $this->isCacheChanged || count($values) !== count($usedCacheItemsKeys);
        if (!$isCacheChanged) {
            foreach ($values as $k => $v) {
                if (!array_key_exists($k, $usedCacheItemsKeys)) {
                    $isCacheChanged = true;
                    break;
                }
            }
        }
        return $isCacheChanged;
    }

    /**
     * @throws InvalidArgumentException
     */
    public function removeNotUsedEntityDataCache(): void
    {
        $cacheKey = $this->getVersionedCacheKey();
        $cacheValues = $this->entityCacheStorageHelper->getItemValues($cacheKey);
        $usedCacheItemsKeys = $this->entityCacheStorageHelper->getUsedCacheItemsKeys($cacheKey);
        foreach ($cacheValues as $k => $v) {
            if (!array_key_exists($k, $usedCacheItemsKeys)) {
                $this->entityCacheStorageHelper->removeItemValueFromCache($cacheKey, $k);
            }
        }
    }
}
