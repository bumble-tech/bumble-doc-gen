<?php

namespace BumbleDocGen\Parser\Entity\Cache;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Parser\Entity\ClassEntity;

trait CacheableEntityWrapperTrait
{
    abstract function getConfiguration(): ConfigurationInterface;

    protected function getCurrentClassEntity(): ?ClassEntity
    {
        $classEntity = null;
        if (method_exists($this, 'getClassEntity')) {
            $classEntity = $this->getClassEntity();
        } elseif (is_subclass_of($this, \BumbleDocGen\Parser\Entity\ClassEntity::class)) {
            $classEntity = $this;
        }
        return $classEntity;
    }

    private function loadEntityDependencies(): array
    {
        $fileDependencies = [];

        $classEntity = $this->getCurrentClassEntity();
        if ($classEntity) {
            $parentClassNames = $classEntity->getReflection()->getParentClassNames();
            $traitClassNames = $classEntity->getReflection()->getTraitNames();
            $interfaceNames = $classEntity->getReflection()->getInterfaceNames();

            $classNames = array_unique(array_merge($parentClassNames, $traitClassNames, $interfaceNames));
            $classNames[] = $classEntity->getName();
            foreach ($classNames as $className) {
                $reflectionClass = $classEntity->getReflector()->reflectClass($className);
                $fileName = $reflectionClass->getFileName();
                if ($fileName) {
                    $relativeFileName = str_replace($classEntity->getConfiguration()->getProjectRoot(), '', $reflectionClass->getFileName());
                    $fileDependencies[$relativeFileName] = md5_file($fileName);
                }
            }
        }
        return $fileDependencies;
    }

    public function getEntityDependencies(): array
    {
        $classEntity = $this->getCurrentClassEntity();
        $entityDependencies = [];
        if ($classEntity) {
            $filesDependenciesCacheKey = '__internalEntityDependencies';
            $entityDependencies = $this->getCacheValue($filesDependenciesCacheKey);
            if (is_null($entityDependencies)) {
                $entityDependencies = self::loadEntityDependencies();
                $this->addValueToCache($filesDependenciesCacheKey, $entityDependencies);
            }
        }
        return $entityDependencies;
    }

    public function reloadEntityDependenciesCache(): void
    {
        $classEntity = $this->getCurrentClassEntity();
        if ($classEntity) {
            $logger = $classEntity->getConfiguration()->getLogger();
            $logger->info("Caching {$classEntity->getFileName()} dependencies");
            $filesDependenciesCacheKey = '__internalEntityDependencies';
            $entityDependencies = self::loadEntityDependencies();
            $this->addValueToCache($filesDependenciesCacheKey, $entityDependencies);
        }
    }

    public function entityCacheIsOutdated(): bool
    {
        static $filesCacheState = [];
        $classEntity = $this->getCurrentClassEntity();
        if ($classEntity) {
            $className = $classEntity->getName();
            if (!isset($filesCacheState[$className])) {
                $projectRoot = $classEntity->getConfiguration()->getProjectRoot();
                $filesCacheState[$className] = false;
                foreach ($this->getEntityDependencies() as $relativeFileName => $hashFile) {
                    if (md5_file("{$projectRoot}{$relativeFileName}") !== $hashFile) {
                        $filesCacheState[$className] = true;
                        break;
                    }
                }
            }
            return $filesCacheState[$className];
        }
        return false;
    }


    protected function getCacheKey(): string
    {
        $currentClassEntity = $this->getCurrentClassEntity();
        return $currentClassEntity ? str_replace(["\\", ":"], "_", $this->getCurrentClassEntity()->getName()) : '';
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