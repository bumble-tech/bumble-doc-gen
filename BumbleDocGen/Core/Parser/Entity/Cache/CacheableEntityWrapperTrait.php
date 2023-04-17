<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity\Cache;

use BumbleDocGen\Core\Cache\EntityCacheItemPool;
use DI\Attribute\Inject;
use Psr\Cache\InvalidArgumentException;

trait CacheableEntityWrapperTrait
{
    private string $cacheVersion = 'v5';

    #[Inject] private EntityCacheItemPool $entityCacheItemPool;
    #[Inject] private EntityCacheStorageHelper $entityCacheStorageHelper;

    abstract public function getCacheKey(): string;

    abstract public function entityCacheIsOutdated(): bool;

    private function getVersionedCacheKey(): string
    {
        return "{$this->cacheVersion}_{$this->getCacheKey()}";
    }

    /**
     * @throws InvalidArgumentException
     */
    final protected function getWrappedMethodResult(
        string $methodName,
        array  $funcArgs,
        string $getCacheKeyGeneratorClassName,
        string $cacheNamespace,
        int    $cacheExpiresAfter
    )
    {
        $cacheKey = $getCacheKeyGeneratorClassName::generateKey(
            $cacheNamespace,
            $this,
            $funcArgs
        );

        $internalDataKey = "__data__";
        $result = $this->getCacheValue($cacheKey);
        if (!is_array($result) || !array_key_exists($internalDataKey, $result) || $this->entityCacheIsOutdated()) {
            $methodReturnValue = call_user_func_array(['parent', $methodName], $funcArgs);
            $result = [
                $internalDataKey => $methodReturnValue,
                "__expires_after__" => $cacheExpiresAfter
            ];
            $this->addValueToCache($cacheKey, $result);
        }
        return $result[$internalDataKey];
    }

    /**
     * @throws InvalidArgumentException
     */
    private function getCacheValues(): array
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
                    if (isset($cacheValue['__expires_after__']) && $cacheValue['__expires_after__'] < $time) {
                        unset($cacheValues[$key]);
                    }
                }
            }
            $this->entityCacheStorageHelper->setCacheValues($cacheKey, $cacheValues);
        }
        return $cacheValues;
    }

    /**
     * @throws InvalidArgumentException
     */
    private function getCacheValue(string $key): mixed
    {
        $cacheValues = $this->getCacheValues();
        return $cacheValues[$key] ?? null;
    }

    private function addValueToCache(string $key, mixed $value): void
    {
        $cacheKey = $this->getVersionedCacheKey();
        $this->entityCacheStorageHelper->addValueToCache($cacheKey, $key, $value);
    }
}
