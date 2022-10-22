<?php

declare(strict_types=1);

namespace BumbleDocGen\Plugin\Event\Parser;

use BumbleDocGen\Parser\SourceLocator\SourceLocatorsCollection;
use Symfony\Contracts\EventDispatcher\Event;

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
