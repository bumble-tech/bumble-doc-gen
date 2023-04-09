<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity\CollectionLogOperation;

final class CloneOperation implements OperationInterface
{
    public function __construct(
        private string               $function,
        private array                $args,
        private OperationsCollection $operationsCollection
    )
    {
    }

    public function getOperationsCollection(): OperationsCollection
    {
        return $this->operationsCollection;
    }

    public function getArgs(): array
    {
        return $this->args;
    }

    public function getFunction(): string
    {
        return $this->function;
    }
}
