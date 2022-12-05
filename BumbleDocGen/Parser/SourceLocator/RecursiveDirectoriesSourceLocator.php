<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\SourceLocator;

use Psr\Cache\CacheItemPoolInterface;

/**
 * Loads all files from the specified directories, which are traversed recursively
 */
final class RecursiveDirectoriesSourceLocator extends BaseSourceLocator
{
    public function __construct(
        array                   $directories,
        array                   $exclude = [],
        ?CacheItemPoolInterface $cache = null
    )
    {
        parent::__construct($cache);
        $directories = array_filter($directories, function ($directory) {
            return is_dir($directory);
        });
        $this->getFinder()->in($directories)->exclude($exclude);
    }
}
