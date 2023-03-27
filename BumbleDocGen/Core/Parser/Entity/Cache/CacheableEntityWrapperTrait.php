<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity\Cache;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Core\Parser\Entity\RootEntityInterface;

trait CacheableEntityWrapperTrait
{
    private string $cacheVersion = 'v4';

    abstract function getConfiguration(): ConfigurationInterface;

    abstract public function getEntityDependencies(): array;

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

    public function entityCacheIsOutdated(): bool
    {
        static $filesCacheState = [];
        $entity = $this->getCurrentRootEntity();
        if ($entity) {
            $entityName = $entity->getName();
            if (!isset($filesCacheState[$entityName])) {
                $projectRoot = $entity->getConfiguration()->getProjectRoot();
                $filesCacheState[$entityName] = false;
                if (!$entity::isEntityNameValid($entityName)) {
                    return false;
                }

                if (!$this->getCachedEntityDependencies()) {
                    $filesCacheState[$entityName] = true;
                    $this->getConfiguration()->getLogger()->warning("Unable to load {$entityName} entity dependencies");
                    return true;
                }

                foreach ($this->getCachedEntityDependencies() as $relativeFileName => $hashFile) {
                    $filePath = "{$projectRoot}{$relativeFileName}";
                    if (!file_exists($filePath) || md5_file($filePath) !== $hashFile) {
                        $filesCacheState[$entityName] = true;
                        break;
                    }
                }
            }
            return $filesCacheState[$entityName];
        }
        return false;
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
