<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity\Cache;

use BumbleDocGen\Core\Cache\LocalCache\EntityCacheItemPool;
use BumbleDocGen\Core\Cache\LocalCache\Exception\ObjectNotFoundException;
use BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache;
use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityInterface;
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

    /**
     * @throws InvalidArgumentException
     * @throws InvalidConfigurationParameterException
     */
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
            $this->logger->info("Caching {$entity->getFileName()} dependencies");
            $filesDependenciesCacheKey = '__internalEntityDependencies';
            $entityDependencies = $this->getEntityDependencies();
            $this->addValueToCache($filesDependenciesCacheKey, $entityDependencies);
        }
    }

    /**
     * @throws InvalidConfigurationParameterException
     * @throws InvalidArgumentException
     */
    public function entityCacheIsOutdated(): bool
    {
        $entity = $this->getCurrentRootEntity();
        $entityName = $entity?->getName();
        if (!$entity || !$entity->isEntityNameValid($entityName)) {
            return false;
        }

        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $entityName);
        } catch (ObjectNotFoundException) {
        }

        $this->localObjectCache->cacheMethodResult(__METHOD__, $entityName, false);
        if (!$this->getCachedEntityDependencies()) {
            $entityCacheIsOutdated = true;
            $this->logger->warning("Unable to load {$entityName} entity dependencies");
        } else {
            $entityCacheIsOutdated = false;
            $projectRoot = $this->configuration->getProjectRoot();
            foreach ($this->getCachedEntityDependencies() as $relativeFileName => $hashFile) {
                $filePath = "{$projectRoot}{$relativeFileName}";
                if (!file_exists($filePath) || md5_file($filePath) !== $hashFile) {
                    $entityCacheIsOutdated = true;
                    break;
                }
            }
        }
        $this->localObjectCache->cacheMethodResult(__METHOD__, $entityName, $entityCacheIsOutdated);
        return $entityCacheIsOutdated;
    }

    protected function getCacheKey(): string
    {
        $currentRootEntity = $this->getCurrentRootEntity();
        return $currentRootEntity ? str_replace(["\\", ":", '\n', '/', '{', '}'], "_{$this->cacheVersion}_", $this->getCurrentRootEntity()->getName()) : '';
    }

    /**
     * @throws InvalidArgumentException
     * @throws InvalidConfigurationParameterException
     */
    public function getCacheValues(): array
    {
        $cacheKey = $this->getCacheKey();
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
     * @throws InvalidConfigurationParameterException
     * @throws InvalidArgumentException
     */
    public function getCacheValue(string $key): mixed
    {
        $cacheValues = $this->getCacheValues();
        return $cacheValues[$key] ?? null;
    }

    public function addValueToCache(string $key, mixed $value): void
    {
        $cacheKey = $this->getCacheKey();
        $this->entityCacheStorageHelper->addValueToCache($cacheKey, $key, $value);
    }
}
