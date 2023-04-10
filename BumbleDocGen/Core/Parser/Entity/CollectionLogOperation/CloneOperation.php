<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity\CollectionLogOperation;

final class CloneOperation implements OperationInterface
{
    private int $usageCount = 0;

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

    public function getKey(): string
    {
        return 'cloneOperation' . uniqid();
    }

    public function incrementUsageCount(): void
    {
        ++$this->usageCount;
    }
}
