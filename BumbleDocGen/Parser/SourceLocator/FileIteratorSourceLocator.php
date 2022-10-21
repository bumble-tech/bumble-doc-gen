<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\SourceLocator;

use Psr\Cache\CacheItemPoolInterface;

/**
 * Loads all files using an iterator
 */
final class FileIteratorSourceLocator extends BaseSourceLocator
{
    public function __construct(\Iterator $fileInfoIterator, ?CacheItemPoolInterface $cache = null)
    {
        parent::__construct($cache);
        $this->getFinder()->append($fileInfoIterator);
    }
}
