<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity\CollectionLogOperation;

use BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
use BumbleDocGen\Core\Parser\Entity\RootEntityInterface;

final class IterateEntitiesOperation implements OperationInterface
{
    private int $usageCount = 0;
    private array $entities = [];

    public function __construct(array $entities)
    {
        foreach ($entities as $position => $entity) {
            $this->entities[$entity->getName()] = $position;
        }
    }

    public function hasEntity(string $entityName): bool
    {
        return array_key_exists($entityName, $this->entities);
    }

    public function getKey(): string
    {
        return 'iterateEntities' . md5(json_encode($this->entities));
    }

    public function incrementUsageCount(): void
    {
        ++$this->usageCount;
    }

    public function getEntitiesData(): array
    {
        return $this->entities;
    }

    /**
     * @return RootEntityInterface[]
     */
    public function call(RootEntityCollection $rootEntityCollection): array
    {
        return iterator_to_array($rootEntityCollection);
    }
}
