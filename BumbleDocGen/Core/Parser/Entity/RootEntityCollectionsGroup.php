<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity;

final class RootEntityCollectionsGroup implements \IteratorAggregate
{
    protected array $rootEntityCollections = [];

    public function getIterator(): \Generator
    {
        yield from $this->rootEntityCollections;
    }

    public function add(RootEntityCollection $rootEntityCollection): void
    {
        $this->rootEntityCollections[$rootEntityCollection::getEntityCollectionName()] = $rootEntityCollection;
    }

    public function get(string $collectionName): ?RootEntityCollection
    {
        return $this->rootEntityCollections[$collectionName] ?? null;
    }
}
