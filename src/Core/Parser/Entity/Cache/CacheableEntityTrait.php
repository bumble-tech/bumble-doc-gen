<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity\Cache;

use BumbleDocGen\Core\Configuration\Configuration;
use DI\Attribute\Inject;
use Psr\Cache\InvalidArgumentException;

trait CacheableEntityTrait
{
    #[Inject] private EntityCacheStorageHelper $entityCacheStorageHelper;
    #[Inject] private Configuration $configuration;

    private string $entityCacheVersion = 'v1';
    private string $entityCacheKey = '';
    private bool $isCacheChanged = false;

    public function getCacheKey(): string
    {
        if (!$this->entityCacheKey) {
            $currentRootEntity = $this->getCurrentRootEntity();
            $configVersion = $this->configuration->getConfigurationVersion();
            $this->entityCacheKey = $currentRootEntity ? md5(
                $this->entityCacheVersion . $configVersion . $this->getCurrentRootEntity()->getName()
            ) : '';
        }
        return $this->entityCacheKey;
    }

    abstract public function entityCacheIsOutdated(): bool;

    /**
     * @throws InvalidArgumentException
     */
    protected function getEntityCacheValue(string $key): mixed
    {
        return $this->entityCacheStorageHelper->getItemValueFromCache($this->getCacheKey(), $key);
    }

    /**
     * @throws InvalidArgumentException
     */
    protected function hasEntityCacheValue(string $key): bool
    {
        $cacheValues = $this->entityCacheStorageHelper->getItemValues($this->getCacheKey());
        return array_key_exists($key, $cacheValues) && is_array($cacheValues[$key]) && $cacheValues[$key];
    }

    /**
     * @throws InvalidArgumentException
     */
    protected function addEntityValueToCache(string $key, mixed $value, int $cacheExpiresAfter = 604800): void
    {
        $this->isCacheChanged = true;
        $this->entityCacheStorageHelper->addItemValueToCache(
            $this->getCacheKey(),
            $key,
            $value,
            $cacheExpiresAfter
        );
    }

    public function removeEntityValueFromCache(string $key): void
    {
        $this->isCacheChanged = true;
        $this->entityCacheStorageHelper->removeItemValueFromCache(
            $this->getCacheKey(),
            $key,
        );
    }

    /**
     * @throws InvalidArgumentException
     */
    public function isEntityDataCacheOutdated(): bool
    {
        $cacheKey = $this->getCacheKey();
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
        $cacheKey = $this->getCacheKey();
        $cacheValues = $this->entityCacheStorageHelper->getItemValues($cacheKey);
        $usedCacheItemsKeys = $this->entityCacheStorageHelper->getUsedCacheItemsKeys($cacheKey);
        foreach ($cacheValues as $k => $v) {
            if (!array_key_exists($k, $usedCacheItemsKeys)) {
                $this->entityCacheStorageHelper->removeItemValueFromCache($cacheKey, $k);
            }
        }
    }
}
