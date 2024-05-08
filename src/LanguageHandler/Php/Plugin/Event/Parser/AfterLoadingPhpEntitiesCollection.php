<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Plugin\Event\Parser;

use BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * The event is called after the initial creation of a collection of PHP entities
 */
final class AfterLoadingPhpEntitiesCollection extends Event
{
    public function __construct(private PhpEntitiesCollection $entitiesCollection)
    {
    }

    public function getPhpEntitiesCollection(): PhpEntitiesCollection
    {
        return $this->entitiesCollection;
    }
}
