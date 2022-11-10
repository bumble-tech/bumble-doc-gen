<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Context;

final class DocumentedEntityWrappersCollection implements \IteratorAggregate
{
    /** @var DocumentedEntityWrapper[] */
    private array $documentedClasses = [];
    private array $iteratorKeys = [];

    public function getIterator(): \Generator
    {
        $i = 0;
        while (count($this->iteratorKeys) !== ++$i) {
            $iteratorKey = $this->iteratorKeys[$i];
            yield $this->documentedClasses[$iteratorKey];
        }
    }

    public function add(DocumentedEntityWrapper $documentedClass): DocumentedEntityWrappersCollection
    {
        if (!isset($this->documentedClasses[$documentedClass->getKey()])) {
            $this->documentedClasses[$documentedClass->getKey()] = $documentedClass;
            $this->iteratorKeys[] = $documentedClass->getKey();
        }
        return $this;
    }
}
