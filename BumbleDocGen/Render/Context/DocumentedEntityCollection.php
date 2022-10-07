<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Context;

final class DocumentedEntityCollection implements \IteratorAggregate
{
    /** @var DocumentedEntity[] */
    private array $documentedClasses = [];

    public function getIterator(): \Generator
    {
        yield from $this->documentedClasses;
    }

    public function add(DocumentedEntity $documentedClass): DocumentedEntityCollection
    {
        $this->documentedClasses[$documentedClass->getKey()] = $documentedClass;
        return $this;
    }
}
