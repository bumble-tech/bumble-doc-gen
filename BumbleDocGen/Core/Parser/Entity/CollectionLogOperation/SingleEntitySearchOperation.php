<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity\CollectionLogOperation;

use BumbleDocGen\Core\Parser\Entity\RootEntityInterface;

final class SingleEntitySearchOperation implements OperationInterface
{
    private ?string $entityName = null;

    public function __construct(
        private string       $functionName,
        private array        $args,
        ?RootEntityInterface $entity
    )
    {
        if ($entity?->entityDataCanBeLoaded()) {
            $this->entityName = $entity->getObjectId();
        }
    }

    public function getFunctionName(): string
    {
        return $this->functionName;
    }

    public function getArgs(): array
    {
        return $this->args;
    }

    public function getEntityName(): ?string
    {
        return $this->entityName;
    }
}
