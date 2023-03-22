<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Render\Context;

final class DocumentedEntityWrappersCollection implements \IteratorAggregate
{
    /** @var DocumentedEntityWrapper[] */
    private array $documentedEntities = [];
    private array $iteratorKeys = [];

    public function getIterator(): \Generator
    {
        $i = 0;
        while (count($this->iteratorKeys) !== $i) {
            $iteratorKey = $this->iteratorKeys[$i];
            yield $this->documentedEntities[$iteratorKey];
            ++$i;
        }
    }

    public function add(DocumentedEntityWrapper $documentedEntity): DocumentedEntityWrappersCollection
    {
        if (!isset($this->documentedEntities[$documentedEntity->getKey()])) {
            $this->documentedEntities[$documentedEntity->getKey()] = $documentedEntity;
            $this->iteratorKeys[] = $documentedEntity->getKey();
        }
        return $this;
    }
}
