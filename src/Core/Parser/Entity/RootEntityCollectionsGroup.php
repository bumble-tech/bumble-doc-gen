<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity;

use BumbleDocGen\LanguageHandler\LanguageHandlersCollection;
use Psr\Cache\InvalidArgumentException;

final class RootEntityCollectionsGroup implements \IteratorAggregate
{
    /**
     * @var RootEntityCollection[]
     */
    protected array $rootEntityCollections = [];

    public function getIterator(): \Generator
    {
        yield from $this->rootEntityCollections;
    }

    public function loadByLanguageHandlers(LanguageHandlersCollection $languageHandlersCollection): CollectionGroupLoadEntitiesResult
    {
        $collectionGroupLoadEntitiesResult = new CollectionGroupLoadEntitiesResult();
        foreach ($languageHandlersCollection as $languageHandler) {
            $collection = $languageHandler->getEntityCollection();
            $loadResult = $collection->loadEntitiesByConfiguration();
            $collectionGroupLoadEntitiesResult->addResult($languageHandler::class, $loadResult);
            $this->add($collection);
        }
        return $collectionGroupLoadEntitiesResult;
    }

    public function add(RootEntityCollection $rootEntityCollection): void
    {
        $this->rootEntityCollections[$rootEntityCollection->getEntityCollectionName()] = $rootEntityCollection;
    }

    public function get(string $collectionName): ?RootEntityCollection
    {
        return $this->rootEntityCollections[$collectionName] ?? null;
    }

    public function clearOperationsLog(): void
    {
        foreach ($this->rootEntityCollections as $rootEntityCollection) {
            if ($rootEntityCollection instanceof LoggableRootEntityCollection) {
                $rootEntityCollection->clearOperationsLogCollection();
            }
        }
    }

    public function getOperationsLog(): array
    {
        $operationsLog = [];
        foreach ($this->rootEntityCollections as $collectionName => $rootEntityCollection) {
            if ($rootEntityCollection instanceof LoggableRootEntityCollection) {
                $operationsLog[$collectionName] = $rootEntityCollection->getOperationsLogCollection();
            } else {
                $operationsLog[$collectionName] = null;
            }
        }
        return $operationsLog;
    }

    public function getOperationsLogWithoutDuplicates(): array
    {
        $operationsLog = [];
        foreach ($this->rootEntityCollections as $collectionName => $rootEntityCollection) {
            if ($rootEntityCollection instanceof LoggableRootEntityCollection) {
                $operationsLog[$collectionName] = $rootEntityCollection->getOperationsLogCollection();
                $operationsLog[$collectionName]->removeSearchDuplicates();
            } else {
                $operationsLog[$collectionName] = null;
            }
        }
        return $operationsLog;
    }

    public function isFoundEntitiesOperationsLogCacheOutdated(array $entitiesCollectionOperationsLog): bool
    {
        foreach ($entitiesCollectionOperationsLog as $collectionName => $operationsLog) {
            $collection = $this->get($collectionName);
            if (!$collection || $operationsLog->isFoundEntitiesCacheOutdated($this->get($collectionName))) {
                return true;
            }
        }
        return false;
    }

    /**
     * @throws InvalidArgumentException
     */
    public function updateAllEntitiesCache(): void
    {
        foreach ($this->rootEntityCollections as $rootEntityCollection) {
            $rootEntityCollection->updateEntitiesCache();
        }
    }
}
