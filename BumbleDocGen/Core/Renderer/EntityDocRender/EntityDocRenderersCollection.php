<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer\EntityDocRender;

use BumbleDocGen\Core\Parser\Entity\RootEntityInterface;

final class EntityDocRenderersCollection implements \IteratorAggregate
{
    /** @var EntityDocRendererInterface[] */
    private array $entityDocRenderers = [];

    public function getIterator(): \Generator
    {
        yield from $this->entityDocRenderers;
    }

    public function add(EntityDocRendererInterface $entityDocRenderer): EntityDocRenderersCollection
    {
        $this->entityDocRenderers[] = $entityDocRenderer;
        return $this;
    }

    public function getFirstMatchingRender(RootEntityInterface $entity): ?EntityDocRendererInterface
    {
        foreach ($this->entityDocRenderers as $entityDocRenderer) {
            if ($entityDocRenderer->isAvailableForEntity($entity)) {
                return $entityDocRenderer;
            }
        }
        return null;
    }
}
