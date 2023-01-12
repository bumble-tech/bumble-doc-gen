<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\SourceLocator;

/**
 * Loads all files using an iterator
 */
final class FileIteratorSourceLocator extends BaseSourceLocator
{
    public function __construct(\Iterator $fileInfoIterator)
    {
        parent::__construct();
        $this->getFinder()->append($fileInfoIterator);
    }
}
