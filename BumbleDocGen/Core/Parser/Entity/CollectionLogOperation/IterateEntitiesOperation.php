<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity\CollectionLogOperation;

final class IterateEntitiesOperation implements OperationInterface
{
    private array $entities;

    public function __construct(array $entities)
    {
        foreach ($entities as $entity) {
            $this->entities[] = [
                'name' => $entity->getName(),
            ];
        }
    }
}
