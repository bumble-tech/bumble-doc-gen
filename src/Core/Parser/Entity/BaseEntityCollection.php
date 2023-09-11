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

    public function get(string $objectName): ?EntityInterface
    {
        return $this->entities[$objectName] ?? null;
    }

    public function remove(string $objectName): void
    {
        unset($this->entities[$objectName]);
    }

    public function has(string $objectName): bool
    {
        return array_key_exists($objectName, $this->entities);
    }

    public function isEmpty(): bool
    {
        return empty($this->entities);
    }
}
