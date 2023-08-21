<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Plugin\Event\Parser;

use BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorsCollection;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Called when source locators are loaded
 */
final class OnLoadSourceLocatorsCollection extends Event
{
    public function __construct(private SourceLocatorsCollection $sourceLocatorsCollection)
    {
    }

    public function getSourceLocatorsCollection(): SourceLocatorsCollection
    {
        return $this->sourceLocatorsCollection;
    }
}
