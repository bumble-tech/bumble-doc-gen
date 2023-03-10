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

    public function isEmpty(): bool
    {
        return empty($this->entities);
    }
}
