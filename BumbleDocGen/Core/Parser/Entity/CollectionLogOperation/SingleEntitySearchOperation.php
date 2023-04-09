<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity\CollectionLogOperation;

use BumbleDocGen\Core\Parser\Entity\RootEntityInterface;

final class SingleEntitySearchOperation implements OperationInterface
{
    private ?string $entityName = null;

    public function __construct(
        private string       $methodName,
        private array        $args,
        ?RootEntityInterface $entity
    )
    {
        if ($entity?->entityDataCanBeLoaded()) {
            $this->entityName = $entity->getObjectId();
        }
    }
}
