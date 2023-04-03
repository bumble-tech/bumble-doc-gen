<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Plugin\Event\Parser;

use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntityCollection;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * The event is called after the initial creation of a collection of class entities
 */
final class AfterLoadingClassEntityCollection extends Event
{
    public function __construct(private ClassEntityCollection $classEntityCollection)
    {
    }

    public function getClassEntityCollection(): ClassEntityCollection
    {
        return $this->classEntityCollection;
    }
}
