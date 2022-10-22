<?php

declare(strict_types=1);

namespace BumbleDocGen\Plugin\Event\Parser;

use BumbleDocGen\Parser\Entity\ClassEntityCollection;
use Symfony\Contracts\EventDispatcher\Event;

final class AfterCreationClassEntityCollection extends Event
{
    public function __construct(private ClassEntityCollection $classEntityCollection)
    {
    }

    public function getClassEntityCollection(): ClassEntityCollection
    {
        return $this->classEntityCollection;
    }
}
