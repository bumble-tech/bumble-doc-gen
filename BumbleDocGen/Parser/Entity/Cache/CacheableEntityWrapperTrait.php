<?php

namespace BumbleDocGen\Parser\Entity\Cache;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper;

trait CacheableEntityWrapperTrait
{
    private string $cacheVersion = 'v3';

    abstract function getConfiguration(): ConfigurationInterface;

    abstract public function getEntityDependencies(): array;

    public function getCurrentClassEntity(): ?ClassEntity
    {
        $classEntity = null;
        if (method_exists($this, 'getClassEntity')) {
            $classEntity = $this->getClassEntity();
        } elseif (is_subclass_of($this, \BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity::class)) {
            $classEntity = $this;
        }
        return $classEntity;
    }

    public function getCachedEntityDependencies(): array
    {
        $classEntity = $this->getCurrentClassEntity();
        $entityDependencies = [];
        if ($classEntity) {
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
        $classEntity = $this->getCurrentClassEntity();
        if ($classEntity) {
            $logger = $classEntity->getConfiguration()->getLogger();
            $logger->info("Caching {$classEntity->getFileName()} dependencies");
            $filesDependenciesCacheKey = '__internalEntityDependencies';
            $entityDependencies = $this->getEntityDependencies();
            $this->addValueToCache($filesDependenciesCacheKey, $entityDependencies);
        }
    }

    public function entityCacheIsOutdated(): bool
    {
        static $filesCacheState = [];return true;
        $classEntity = $this->getCurrentClassEntity();
        if ($classEntity) {
            $className = $classEntity->getName();
            if (!isset($filesCacheState[$className])) {
                $projectRoot = $classEntity->getConfiguration()->getProjectRoot();
                $filesCacheState[$className] = false;
                if (!ParserHelper::isCorrectClassName($className) || ParserHelper::isBuiltInClass($className)) {
                    return false;
                }

                if (!$this->getCachedEntityDependencies()) {
                    $filesCacheState[$className] = true;
                    $this->getConfiguration()->getLogger()->warning("Unable to load {$className} class dependencies");
                    return true;
                }

                foreach ($this->getCachedEntityDependencies() as $relativeFileName => $hashFile) {
                    $filePath = "{$projectRoot}{$relativeFileName}";
                    if (!file_exists($filePath) || md5_file($filePath) !== $hashFile) {
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
        return $currentClassEntity ? str_replace(["\\", ":", '\n', '/'], "_{$this->cacheVersion}_", $this->getCurrentClassEntity()->getName()) : '';
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