<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity\Cache;

use BumbleDocGen\Core\Cache\LocalCache\Exception\ObjectNotFoundException;
use BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache;
use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityInterface;

trait CacheableEntityWrapperTrait
{
    private string $cacheVersion = 'v4';

    abstract function getConfiguration(): Configuration;

    abstract public function getEntityDependencies(): array;

    abstract protected function getLocalObjectCache(): LocalObjectCache;

    private function getCurrentRootEntity(): ?RootEntityInterface
    {
        if (is_a($this, RootEntityInterface::class)) {
            return $this;
        } else if (method_exists($this, 'getRootEntity')) {
            return $this->getRootEntity();
        }
        return null;
    }

    public function getCachedEntityDependencies(): array
    {
        $entity = $this->getCurrentRootEntity();
        $entityDependencies = [];
        if ($entity) {
            $filesDependenciesCacheKey = '__internalEntityDependencies';
            $entityDependencies = $this->getCacheValue($filesDependenciesCacheKey);
            if (is_null($entityDependencies)) {
                $entityDependencies = $this->getEntityDependencies();
                $this->addValueToCache($filesDependenciesCacheKey, $entityDependencies);
            }
        }
        return $entityDependencies;
    }

    public function reloadEntityDependenciesCache(): void
    {
        $entity = $this->getCurrentRootEntity();
        if ($entity) {
            $logger = $entity->getConfiguration()->getLogger();
            $logger->info("Caching {$entity->getFileName()} dependencies");
            $filesDependenciesCacheKey = '__internalEntityDependencies';
            $entityDependencies = $this->getEntityDependencies();
            $this->addValueToCache($filesDependenciesCacheKey, $entityDependencies);
        }
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function entityCacheIsOutdated(): bool
    {
        $entity = $this->getCurrentRootEntity();
        $entityName = $entity?->getName();
        if (!$entity || !$entity->isEntityNameValid($entityName)) {
            return false;
        }

        try {
            return $this->getLocalObjectCache()->getMethodCachedResult(__METHOD__, $entityName);
        } catch (ObjectNotFoundException) {
        }

        $this->getLocalObjectCache()->cacheMethodResult(__METHOD__, $entityName, false);
        if (!$this->getCachedEntityDependencies()) {
            $entityCacheIsOutdated = true;
            $this->getConfiguration()->getLogger()->warning("Unable to load {$entityName} entity dependencies");
        } else {
            $entityCacheIsOutdated = false;
            $projectRoot = $entity->getConfiguration()->getProjectRoot();
            foreach ($this->getCachedEntityDependencies() as $relativeFileName => $hashFile) {
                $filePath = "{$projectRoot}{$relativeFileName}";
                if (!file_exists($filePath) || md5_file($filePath) !== $hashFile) {
                    $entityCacheIsOutdated = true;
                    break;
                }
            }
        }
        $this->getLocalObjectCache()->cacheMethodResult(__METHOD__, $entityName, $entityCacheIsOutdated);
        return $entityCacheIsOutdated;
    }

    protected function getCacheKey(): string
    {
        $currentRootEntity = $this->getCurrentRootEntity();
        return $currentRootEntity ? str_replace(["\\", ":", '\n', '/', '{', '}'], "_{$this->cacheVersion}_", $this->getCurrentRootEntity()->getName()) : '';
    }

    public function getCacheValues(): array
    {
        $cacheKey = $this->getCacheKey();
        $cacheValues = EntityCacheStorageHelper::getCacheValues($cacheKey);
        if (is_null($cacheValues)) {
            $cacheValues = [];
            $cacheItemPool = $this->getConfiguration()->getEntityCacheItemPool();
            if (
                $cacheItemPool->hasItem($cacheKey) &&
                !$this->entityCacheIsOutdated()
            ) {
                $cacheValues = $cacheItemPool->getItem($cacheKey)->get();
                $time = time();
                foreach ($cacheValues as $key => $cacheValue) {
                    if (isset($cacheValue['__expires_after__']) && $cacheValue['__expires_after__'] < $time) {
                        unset($cacheValues[$key]);
                    }
                }
            }
            EntityCacheStorageHelper::setCacheValues($cacheKey, $cacheValues);
        }
        return $cacheValues;
    }

    public function getCacheValue(string $key): mixed
    {
        $cacheValues = $this->getCacheValues();
        return $cacheValues[$key] ?? null;
    }

    public function addValueToCache(string $key, mixed $value): void
    {
        $cacheKey = $this->getCacheKey();
        EntityCacheStorageHelper::addValueToCache($cacheKey, $key, $value);
    }
}
