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

    /**
     * Get an entity from a collection (only previously added)
     *
     * @api
     */
    public function get(string $objectName): ?EntityInterface
    {
        return $this->entities[$objectName] ?? null;
    }

    /**
     * Remove an entity from a collection
     *
     * @api
     */
    public function remove(string $objectName): void
    {
        unset($this->entities[$objectName]);
    }

    /**
     * Check if an entity has been added to the collection
     *
     * @api
     */
    public function has(string $objectName): bool
    {
        return array_key_exists($objectName, $this->entities);
    }

    /**
     * Check if the collection is empty or not
     *
     * @api
     */
    public function isEmpty(): bool
    {
        return empty($this->entities);
    }
}
