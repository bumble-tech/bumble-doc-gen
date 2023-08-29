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
    private array $singleOperationsEntityCommands = [];

    public function getIterator(): \Traversable
    {
        return new \ArrayObject($this->operations);
    }

    public function add(OperationInterface $operation): void
    {
        $key = $operation->getKey();
        if (!array_key_exists($key, $this->operations)) {
            $this->operations[$key] = $operation;
            if (is_a($operation, SingleEntitySearchOperation::class)) {
                $id = $operation->getRequestedEntityName();
                $this->singleOperationsEntityCommands[$id][$operation->getFunctionName()] = 1;
            }
        }
        $this->operations[$key]->incrementUsageCount();
    }

    public function removeSearchDuplicates(): void
    {
        /** @var IterateEntitiesOperation[] $iterateOperations */
        $iterateOperations = array_filter($this->operations, fn(OperationInterface $operation) => $operation instanceof IterateEntitiesOperation);
        /** @var SingleEntitySearchOperation[] $singleEntitySearchOperations */
        $singleEntitySearchOperations = array_filter($this->operations, fn(OperationInterface $operation) => $operation instanceof SingleEntitySearchOperation);

        if ($iterateOperations) {
            foreach ($singleEntitySearchOperations as $k => $singleEntitySearchOperation) {
                if (!$singleEntitySearchOperation->getRequestedEntityName()) {
                    continue;
                }
                foreach ($iterateOperations as $iterateOperation) {
                    if ($iterateOperation->hasEntity($singleEntitySearchOperation->getRequestedEntityName())) {
                        unset($this->operations[$k]);
                        unset($singleEntitySearchOperations[$k]);
                    }
                }
            }
        }

        if ($singleEntitySearchOperations) {
            foreach ($singleEntitySearchOperations as $key => $singleEntitySearchOperation) {
                $entityName = $singleEntitySearchOperation->getRequestedEntityName();
                $usedCommands = $this->singleOperationsEntityCommands[$entityName] ?? [];
                $functionName = $singleEntitySearchOperation->getFunctionName();

                if (isset($usedCommands['getLoadedOrCreateNew']) && $functionName !== 'getLoadedOrCreateNew') {
                    unset($this->operations[$key]);
                    unset($singleEntitySearchOperations[$key]);
                } elseif (!isset($usedCommands['getLoadedOrCreateNew']) && isset($usedCommands['findEntity']) && $functionName !== 'findEntity') {
                    unset($this->operations[$key]);
                    unset($singleEntitySearchOperations[$key]);
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
    ): bool {
        foreach ($operationsCollection->operations as $operation) {
            if ($operation instanceof SingleEntitySearchOperation) {
                $entity = $operation->call($rootEntityCollection);
                if (is_null($operation->getEntityName()) && (is_null($entity) || $entity->entityCacheIsOutdated())) {
                    continue;
                }
                if ($entity && !$entity::isEntityNameValid($entity?->getName())) {
                    continue;
                }

                $entityName = $entity?->getName();
                $entityName = $entityName && $entity?->entityDataCanBeLoaded() ? $entityName : null;
                if ($operation->getEntityName() !== $entityName) {
                    return true;
                } elseif ($entity?->entityCacheIsOutdated() && $entity?->entityDataCanBeLoaded()) {
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

    public function __serialize(): array
    {
        return [
            'operations' => $this->operations,
        ];
    }

    public function __unserialize(array $data): void
    {
        $this->operations = $data['operations'] ?? [];
    }
}
