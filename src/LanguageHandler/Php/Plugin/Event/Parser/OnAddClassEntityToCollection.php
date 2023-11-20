<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Plugin\Event\Parser;

use BumbleDocGen\Core\Plugin\OnlySingleExecutionEvent;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Called when each class entity is added to the entity collection
 */
final class OnAddClassEntityToCollection extends Event implements OnlySingleExecutionEvent
{
    public function __construct(
        private ClassLikeEntity $classEntity,
        private ClassEntityCollection $classEntityCollection
    ) {
    }

    public function getUniqueExecutionId(): string
    {
        return "{$this->classEntity->getName()}{$this->classEntityCollection->getEntityCollectionName()}";
    }

    public function getClassEntityCollection(): ClassEntityCollection
    {
        return $this->classEntityCollection;
    }

    public function getRootEntity(): ClassLikeEntity
    {
        return $this->classEntity;
    }
}
