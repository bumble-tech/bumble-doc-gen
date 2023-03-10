<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Render\EntityDocRender;

use BumbleDocGen\Core\Parser\Entity\RootEntityInterface;

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

    public function getFirstMatchingRender(RootEntityInterface $entity): ?EntityDocRenderInterface
    {
        foreach ($this->entityDocRenders as $entityDocRender) {
            if ($entityDocRender->isAvailableForEntity($entity)) {
                return $entityDocRender;
            }
        }
        return null;
    }
}
