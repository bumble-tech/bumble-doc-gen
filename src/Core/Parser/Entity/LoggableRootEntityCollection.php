<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity;

use BumbleDocGen\Core\Parser\Entity\CollectionLogOperation\CloneOperation;
use BumbleDocGen\Core\Parser\Entity\CollectionLogOperation\IterateEntitiesOperation;
use BumbleDocGen\Core\Parser\Entity\CollectionLogOperation\OperationInterface;
use BumbleDocGen\Core\Parser\Entity\CollectionLogOperation\OperationsCollection;
use BumbleDocGen\Core\Parser\Entity\CollectionLogOperation\SingleEntitySearchOperation;

abstract class LoggableRootEntityCollection extends RootEntityCollection
{
    private ?string $callerNameToSkipLogging = null;
    private OperationsCollection $operationsCollection;

    public function __construct()
    {
        $this->operationsCollection = new OperationsCollection();
    }

    public function getOperationsLogCollection(): OperationsCollection
    {
        return $this->operationsCollection;
    }

    public function clearOperationsLogCollection(): void
    {
        $this->operationsCollection = new OperationsCollection();
    }

    private function logOperation(OperationInterface $operation): void
    {
        if ($this->callerNameToSkipLogging) {
            $backtrace = debug_backtrace(0, 3);
            if ($this->callerNameToSkipLogging === $backtrace[2]['function'] ?? '') {
                return;
            } else {
                $this->callerNameToSkipLogging = null;
            }
        }
        $this->operationsCollection->add($operation);
    }

    final public function getIterator(): \Generator
    {
        $foundEntities = [];
        foreach (parent::getIterator() as $entity) {
            /** @var RootEntityInterface $entity */
            $foundEntities[] = $entity;
        }
        $this->logOperation(new IterateEntitiesOperation($foundEntities));
        yield from parent::getIterator();
    }

    private function __clone()
    {
    }

    final protected function cloneForFiltration(bool $onlyLoaded = true): static
    {
        $clone = clone $this;
        $backtrace = debug_backtrace(0, 2);
        $clone->operationsCollection = new OperationsCollection();
        $this->operationsCollection->add(
            new CloneOperation(
                $backtrace[1]['function'],
                $backtrace[1]['args'] ?? [],
                $clone->operationsCollection
            )
        );
        $clone->callerNameToSkipLogging = $backtrace[1]['function'];
        if ($onlyLoaded) {
            foreach ($clone->entities as $objectId => $rootEntity) {
                if (!$rootEntity->isEntityDataCanBeLoaded()) {
                    $clone->remove($objectId);
                }
            }
        }
        return $clone;
    }

    abstract protected function prepareObjectName(string $objectName): string;

    final public function get(string $objectName): ?RootEntityInterface
    {
        $objectName = $this->prepareObjectName($objectName);
        $result = parent::get($objectName);
        $this->logOperation(
            new SingleEntitySearchOperation(
                __FUNCTION__,
                func_get_args(),
                $result
            )
        );
        return $result;
    }

    abstract protected function internalGetLoadedOrCreateNew(string $objectName): RootEntityInterface;

    final public function getLoadedOrCreateNew(string $objectName, bool $withAddClassEntityToCollectionEvent = false): RootEntityInterface
    {
        $objectName = $this->prepareObjectName($objectName);
        $result = $this->internalGetLoadedOrCreateNew($objectName, $withAddClassEntityToCollectionEvent);
        $this->logOperation(
            new SingleEntitySearchOperation(
                __FUNCTION__,
                func_get_args(),
                $result
            )
        );
        return $result;
    }

    abstract protected function internalFindEntity(string $search, bool $useUnsafeKeys = true): ?RootEntityInterface;

    final public function findEntity(string $search, bool $useUnsafeKeys = true): ?RootEntityInterface
    {
        $result = $this->internalFindEntity($search, $useUnsafeKeys);
        $this->logOperation(new SingleEntitySearchOperation(__FUNCTION__, func_get_args(), $result));
        return $result;
    }
}
