<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity\CollectionLogOperation;

final class CloneOperation implements OperationInterface
{
    public function __construct(
        private string $function,
        private array $args,
        private OperationsCollection $operationsCollection
    )
    {
    }
}
