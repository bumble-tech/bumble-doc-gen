<?php

declare(strict_types=1);

namespace BumbleDocGen\Plugin\Event\Parser;

use BumbleDocGen\Parser\Entity\ClassEntity;
use BumbleDocGen\Parser\Entity\ClassEntityCollection;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Called when each class entity is added to the entity collection
 */
final class OnAddClassEntityToCollection extends Event
{
    public function __construct(
        private ClassEntity $classEntity,
        private ClassEntityCollection $classEntityCollection
    ) {
    }

    public function getClassEntityCollection(): ClassEntityCollection
    {
        return $this->classEntityCollection;
    }

    public function getClassEntity(): ClassEntity
    {
        return $this->classEntity;
    }
}
