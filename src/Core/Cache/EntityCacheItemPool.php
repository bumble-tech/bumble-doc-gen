<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Cache;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use Psr\Cache\CacheItemInterface;
use Psr\Cache\CacheItemPoolInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Cache\CacheItem;

/**
 * @internal
 */
final class EntityCacheItemPool implements CacheItemPoolInterface
{
    private ?CacheItemPoolInterface $cacheItemPool = null;

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function __construct(
        Configuration $configuration
    ) {
        $entityNamespaceKey = md5($configuration->getOutputDir());
        if ($configuration->getCacheDir()) {
            $this->cacheItemPool = new FilesystemAdapter(
                "entity_{$entityNamespaceKey}",
                604800,
                $configuration->getCacheDir()
            );
        }
    }

    public function getItem(string $key): CacheItemInterface
    {
        if (!$this->cacheItemPool) {
            return new CacheItem();
        }
        return $this->cacheItemPool->getItem($key);
    }

    public function getItems(array $keys = []): iterable
    {
        if (!$this->cacheItemPool) {
            return [];
        }
        return $this->cacheItemPool->getItems($keys);
    }

    public function hasItem(string $key): bool
    {
        if (!$this->cacheItemPool) {
            return false;
        }

        return $this->cacheItemPool->hasItem($key);
    }

    public function clear(): bool
    {
        if (!$this->cacheItemPool) {
            return false;
        }
        return $this->cacheItemPool->clear();
    }

    public function deleteItem(string $key): bool
    {
        if (!$this->cacheItemPool) {
            return false;
        }
        return $this->cacheItemPool->deleteItem($key);
    }

    public function deleteItems(array $keys): bool
    {
        if (!$this->cacheItemPool) {
            return false;
        }
        return $this->cacheItemPool->deleteItems($keys);
    }

    public function save(CacheItemInterface $item): bool
    {
        if (!$this->cacheItemPool) {
            return false;
        }
        return $this->cacheItemPool->save($item);
    }

    public function saveDeferred(CacheItemInterface $item): bool
    {
        if (!$this->cacheItemPool) {
            return false;
        }
        return $this->cacheItemPool->saveDeferred($item);
    }

    public function commit(): bool
    {
        if (!$this->cacheItemPool) {
            return false;
        }
        return $this->cacheItemPool->commit();
    }
}
