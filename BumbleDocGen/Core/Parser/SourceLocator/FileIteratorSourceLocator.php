<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\SourceLocator;

/**
 * Loads all files using an iterator
 */
final class FileIteratorSourceLocator extends BaseSourceLocator
{
    public function __construct(\Iterator $fileInfoIterator, bool $greedyLoad = true)
    {
        parent::__construct($greedyLoad);
        $this->getFinder()->append($fileInfoIterator);
    }
}
