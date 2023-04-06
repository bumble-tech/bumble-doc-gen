<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity;

abstract class BaseEntityCollection implements \IteratorAggregate
{
    protected array $entities = [];

    public function getIterator(): \Generator
    {
        ksort($this->entities, SORT_STRING);
        yield from $this->entities;
    }

    public function get(string $objectId): ?EntityInterface
    {
        return $this->entities[$objectId] ?? null;
    }

    public function remove(string $objectId): void
    {
        unset($this->entities[$objectId]);
    }

    public function has(string $objectId): bool
    {
        return array_key_exists($objectId, $this->entities);
    }

    public function isEmpty(): bool
    {
        return empty($this->entities);
    }
}
