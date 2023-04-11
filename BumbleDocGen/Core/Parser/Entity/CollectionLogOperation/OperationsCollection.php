<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity\CollectionLogOperation;

use BumbleDocGen\Core\Parser\Entity\RootEntityCollection;

final class OperationsCollection implements \IteratorAggregate
{
    /**
     * @var OperationInterface[]
     */
    protected array $operations = [];

    public function getIterator(): \Traversable
    {
        return new \ArrayObject($this->operations);
    }

    public function add(OperationInterface $operation): void
    {
        $key = $operation->getKey();
        if (!array_key_exists($key, $this->operations)) {
            $this->operations[$key] = $operation;
        }
        $this->operations[$key]->incrementUsageCount();
    }

    public function removeSearchDuplicates(): void
    {
        /** @var IterateEntitiesOperation[] $singleEntitySearchOperations */
        $iterateOperations = array_filter($this->operations, fn(OperationInterface $operation) => $operation instanceof IterateEntitiesOperation);
        /** @var SingleEntitySearchOperation[] $singleEntitySearchOperations */
        $singleEntitySearchOperations = array_filter($this->operations, fn(OperationInterface $operation) => $operation instanceof SingleEntitySearchOperation);

        if ($iterateOperations) {
            foreach ($singleEntitySearchOperations as $k => $singleEntitySearchOperation) {
                if (!$singleEntitySearchOperation->getEntityName()) {
                    continue;
                }
                foreach ($iterateOperations as $iterateOperation) {
                    if ($iterateOperation->hasEntity($singleEntitySearchOperation->getEntityName())) {
                        unset($this->operations[$k]);
                        unset($singleEntitySearchOperations[$k]);
                    }
                }
            }
        }

        if ($singleEntitySearchOperations) {
            $findEntitySearchOperations = array_filter($singleEntitySearchOperations, fn(OperationInterface $operation) => $operation->getFunctionName() === 'findEntity');
            $getLoadedOrCreateNewOperations = array_filter($singleEntitySearchOperations, fn(OperationInterface $operation) => $operation->getFunctionName() === 'getLoadedOrCreateNew');
            $getOperations = array_filter($singleEntitySearchOperations, fn(OperationInterface $operation) => $operation->getFunctionName() === 'get');

            foreach ($findEntitySearchOperations as $findEntitySearchOperation) {
                foreach ($getLoadedOrCreateNewOperations as $k => $getLoadedOrCreateNewOperation) {
                    if (is_null($getLoadedOrCreateNewOperation->getEntityName())) {
                        continue;
                    }
                    if ($findEntitySearchOperation->getEntityName() === $getLoadedOrCreateNewOperation->getEntityName()) {
                        unset($getLoadedOrCreateNewOperations[$k]);
                        unset($this->operations[$k]);
                    }
                }
                foreach ($getOperations as $k => $getOperation) {
                    if (is_null($getOperation->getEntityName())) {
                        continue;
                    }
                    if ($findEntitySearchOperation->getEntityName() === $getOperation->getEntityName()) {
                        unset($getOperations[$k]);
                        unset($this->operations[$k]);
                    }
                }
            }
            foreach ($getLoadedOrCreateNewOperations as $getLoadedOrCreateNewOperation) {
                foreach ($getOperations as $k => $getOperation) {
                    if (is_null($getOperation->getEntityName())) {
                        continue;
                    }
                    if ($getLoadedOrCreateNewOperation->getEntityName() === $getOperation->getEntityName()) {
                        unset($getOperations[$k]);
                        unset($this->operations[$k]);
                    }
                }
            }
        }
        array_walk($this->operations, function (OperationInterface $operation) {
            if ($operation instanceof CloneOperation) {
                $operation->getOperationsCollection()->removeSearchDuplicates();
            }
        });
    }

    public function isFoundEntitiesCacheOutdated(RootEntityCollection $rootEntityCollection): bool
    {
        return $this->checkIsFoundEntitiesCacheOutdatedRecursive($rootEntityCollection, $this);
    }

    private function checkIsFoundEntitiesCacheOutdatedRecursive(
        RootEntityCollection $rootEntityCollection,
        OperationsCollection $operationsCollection,
    ): bool
    {
        foreach ($operationsCollection->operations as $operation) {
            if ($operation instanceof SingleEntitySearchOperation) {
                $entity = $operation->call($rootEntityCollection);
                if (is_null($operation->getEntityName()) && (is_null($entity) || $entity->entityCacheIsOutdated())) {
                    continue;
                }
                if ($entity && !$entity::isEntityNameValid($entity?->getName())) {
                    continue;
                }
                if ($operation->getEntityName() !== $entity?->getName()) {
                    return true;
                } elseif ($entity?->entityCacheIsOutdated()) {
                    return true;
                }

            } elseif ($operation instanceof IterateEntitiesOperation) {
                $entities = $operation->call($rootEntityCollection);
                $entitiesData = $operation->getEntitiesData();
                if (count($entitiesData) !== count($entities)) {
                    return true;
                }
                foreach ($entities as $entity) {
                    if (!array_key_exists($entity->getName(), $entitiesData) || $entity->entityCacheIsOutdated()) {
                        return true;
                    }
                }
            } elseif ($operation instanceof CloneOperation) {
                $isOperationsCacheOutdated = $this->checkIsFoundEntitiesCacheOutdatedRecursive(
                    $operation->call($rootEntityCollection),
                    $operation->getOperationsCollection(),
                );
                if ($isOperationsCacheOutdated) {
                    return true;
                }
            } else {
                return true;
            }
        }
        return false;
    }
}
