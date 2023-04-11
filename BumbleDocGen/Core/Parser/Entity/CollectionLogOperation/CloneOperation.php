<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity\CollectionLogOperation;

use BumbleDocGen\Core\Parser\Entity\RootEntityCollection;

final class CloneOperation implements OperationInterface
{
    private int $usageCount = 0;

    public function __construct(
        private string               $functionName,
        private array                $args,
        private OperationsCollection $operationsCollection
    )
    {
    }

    public function getOperationsCollection(): OperationsCollection
    {
        return $this->operationsCollection;
    }

    public function getKey(): string
    {
        return 'cloneOperation' . uniqid();
    }

    public function incrementUsageCount(): void
    {
        ++$this->usageCount;
    }

    public function call(RootEntityCollection $rootEntityCollection): RootEntityCollection
    {
        return call_user_func_array([$rootEntityCollection, $this->functionName], $this->args);
    }
}
