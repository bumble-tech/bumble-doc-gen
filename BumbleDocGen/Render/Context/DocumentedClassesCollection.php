<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Context;

final class DocumentedClassesCollection implements \IteratorAggregate
{
    /** @var DocumentedClass[] */
    private array $documentedClasses = [];

    public function getIterator(): \Generator
    {
        yield from $this->documentedClasses;
    }

    public function add(DocumentedClass $documentedClass): DocumentedClassesCollection
    {
        $this->documentedClasses[$documentedClass->getKey()] = $documentedClass;
        return $this;
    }
}
