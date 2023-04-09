<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity\CollectionLogOperation;

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
        $this->operations[] = $operation;
    }
}
