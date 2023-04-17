<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity\Cache;

use BumbleDocGen\Core\Cache\LocalCache\EntityCacheItemPool;
use BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache;
use BumbleDocGen\Core\Cache\SharedCompressedDocumentFileCache;
use BumbleDocGen\Core\Configuration\Configuration;
use DI\Attribute\Inject;
use Psr\Cache\InvalidArgumentException;
use Psr\Log\LoggerInterface;

trait CacheableEntityWrapperTrait
{
    private string $cacheVersion = 'v4';

    #[Inject] private EntityCacheItemPool $entityCacheItemPool;
    #[Inject] private Configuration $configuration;
    #[Inject] private LoggerInterface $logger;
    #[Inject] private LocalObjectCache $localObjectCache;
    #[Inject] private EntityCacheStorageHelper $entityCacheStorageHelper;
    #[Inject] private SharedCompressedDocumentFileCache $sharedCompressedDocumentFileCache;

    abstract public function getCacheKey(): string;

    abstract public function entityCacheIsOutdated(): bool;

    private function getVersionedCacheKey(): string
    {
        return "{$this->cacheVersion}_{$this->getCacheKey()}";
    }

    /**
     * @throws InvalidArgumentException
     */
    public function getCacheValues(): array
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
    public function getCacheValue(string $key): mixed
    {
        $cacheValues = $this->getCacheValues();
        return $cacheValues[$key] ?? null;
    }

    public function addValueToCache(string $key, mixed $value): void
    {
        $cacheKey = $this->getVersionedCacheKey();
        $this->entityCacheStorageHelper->addValueToCache($cacheKey, $key, $value);
    }
}
