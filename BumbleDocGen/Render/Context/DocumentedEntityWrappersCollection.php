<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Context;

final class DocumentedEntityWrappersCollection implements \IteratorAggregate
{
    /** @var DocumentedEntityWrapper[] */
    private array $documentedClasses = [];

    public function getIterator(): \Generator
    {
        yield from $this->documentedClasses;
    }

    public function add(DocumentedEntityWrapper $documentedClass): DocumentedEntityWrappersCollection
    {
        $this->documentedClasses[$documentedClass->getKey()] = $documentedClass;
        return $this;
    }
}
