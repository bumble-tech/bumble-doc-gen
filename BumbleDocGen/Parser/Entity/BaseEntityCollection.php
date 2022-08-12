<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\Entity;

abstract class BaseEntityCollection implements \IteratorAggregate
{
    protected array $entities = [];

    public function getIterator(): \Generator
    {
        yield from $this->entities;
    }

    public function isEmpty(): bool
    {
        return empty($this->entities);
    }
}
