<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\SourceLocator;

/**
 * Loads all files from the specified directories, which are traversed recursively
 */
final class RecursiveDirectoriesSourceLocator extends BaseSourceLocator
{
    public function __construct(
        array $directories,
        array $exclude = [],
        bool  $greedyLoad = true
    )
    {
        parent::__construct($greedyLoad);
        $directories = array_filter($directories, function ($directory) {
            return is_dir($directory);
        });
        $this->getFinder()->in($directories)->exclude($exclude);
    }
}
