<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\SourceLocator;

use Psr\Cache\CacheItemPoolInterface;

/**
 * Loads all files from the specified directory
 */
final class DirectorySourceLocator extends BaseSourceLocator
{
    public function __construct(
        string $directory,
        ?CacheItemPoolInterface $cache = null
    ) {
        parent::__construct($cache);
        $this->getFinder()->in($directory)->depth("==0");
    }
}
