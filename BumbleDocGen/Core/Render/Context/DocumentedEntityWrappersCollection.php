<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Render\Context;

use BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache;
use BumbleDocGen\Core\Parser\Entity\RootEntityInterface;

final class DocumentedEntityWrappersCollection implements \IteratorAggregate
{
    /** @var DocumentedEntityWrapper[] */
    private array $documentedEntities = [];
    private array $iteratorKeys = [];
    private array $documentedEntitiesRelations = [];

    public function __construct(
        private RenderContext    $renderContext,
        private LocalObjectCache $localObjectCache
    )
    {
    }

    public function getIterator(): \Generator
    {
        $i = 0;
        while (count($this->iteratorKeys) !== $i) {
            $iteratorKey = $this->iteratorKeys[$i];
            yield $this->documentedEntities[$iteratorKey];
            ++$i;
        }
    }

    public function createAndAddDocumentedEntityWrapper(RootEntityInterface $rootEntity): DocumentedEntityWrapper
    {
        $documentedEntity = new DocumentedEntityWrapper(
            $rootEntity,
            $this->localObjectCache,
            $this->renderContext->getCurrentTemplateFilePatch()
        );

        $parentEntityName = $this->renderContext->getCurrentDocumentedEntityWrapper()?->getEntityName();
        $this->documentedEntitiesRelations[$this->renderContext->getCurrentTemplateFilePatch()][$parentEntityName][$documentedEntity->getEntityName()] = [
            'entity_name' => $documentedEntity->getEntityName(),
            'collection_name' => $documentedEntity->getDocumentTransformableEntity()->getRootEntityCollection()::getEntityCollectionName(),
        ];
        if (!isset($this->documentedEntities[$documentedEntity->getKey()])) {
            $this->documentedEntities[$documentedEntity->getKey()] = $documentedEntity;
            $this->iteratorKeys[] = $documentedEntity->getKey();
        }
        return $documentedEntity;
    }

    public function getDocumentedEntitiesRelations(): array
    {
        return $this->documentedEntitiesRelations;
    }
}
