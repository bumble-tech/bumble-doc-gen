<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Plugin\Event\Parser;

use BumbleDocGen\Core\Plugin\OnlySingleExecutionEvent;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Called when each class entity is added to the entity collection
 */
final class OnAddClassEntityToCollection extends Event implements OnlySingleExecutionEvent
{
    public function __construct(
        private ClassLikeEntity $classEntity,
        private PhpEntitiesCollection $entitiesCollection
    ) {
    }

    public function getUniqueExecutionId(): string
    {
        return "{$this->classEntity->getName()}{$this->entitiesCollection->getEntityCollectionName()}";
    }

    public function getClassEntityCollection(): PhpEntitiesCollection
    {
        return $this->entitiesCollection;
    }

    public function getRootEntity(): ClassLikeEntity
    {
        return $this->classEntity;
    }
}
