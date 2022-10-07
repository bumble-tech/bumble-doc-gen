<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\EntityDocRender;

use BumbleDocGen\Render\Context\DocumentedEntityWrapper;

final class EntityDocRendersCollection implements \IteratorAggregate
{
    /** @var EntityDocRenderInterface[] */
    private array $entityDocRenders = [];

    public function getIterator(): \Generator
    {
        yield from $this->entityDocRenders;
    }

    public function add(EntityDocRenderInterface $entityDocRender): EntityDocRendersCollection
    {
        $this->entityDocRenders[] = $entityDocRender;
        return $this;
    }

    public function getFirstMatchingRender(DocumentedEntityWrapper $entityWrapper): ?EntityDocRenderInterface
    {
        foreach ($this->entityDocRenders as $entityDocRender) {
            if ($entityDocRender->isAvailableForEntity($entityWrapper)) {
                return $entityDocRender;
            }
        }
        return null;
    }
}
