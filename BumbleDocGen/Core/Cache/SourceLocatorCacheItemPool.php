<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Cache;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use Psr\Cache\CacheItemInterface;
use Psr\Cache\CacheItemPoolInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

final class SourceLocatorCacheItemPool implements CacheItemPoolInterface
{
    private CacheItemPoolInterface $cacheItemPool;

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function __construct(
        Configuration $configuration
    )
    {
        $this->cacheItemPool = new FilesystemAdapter(
            'sourceLocator',
            604800,
            $configuration->getCacheDir()
        );
    }

    public function getItem(string $key): CacheItemInterface
    {
        return $this->cacheItemPool->getItem($key);
    }

    public function getItems(array $keys = []): iterable
    {
        return $this->cacheItemPool->getItems($keys);
    }

    public function hasItem(string $key): bool
    {
        return $this->cacheItemPool->hasItem($key);
    }

    public function clear(): bool
    {
        return $this->cacheItemPool->clear();
    }

    public function deleteItem(string $key): bool
    {
        return $this->cacheItemPool->deleteItem($key);
    }

    public function deleteItems(array $keys): bool
    {
        return $this->cacheItemPool->deleteItems($keys);
    }

    public function save(CacheItemInterface $item): bool
    {
        return $this->cacheItemPool->save($item);
    }

    public function saveDeferred(CacheItemInterface $item): bool
    {
        return $this->cacheItemPool->saveDeferred($item);
    }

    public function commit(): bool
    {
        return $this->cacheItemPool->commit();
    }
}
