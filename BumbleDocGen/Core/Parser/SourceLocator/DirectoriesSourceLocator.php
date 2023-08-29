<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\SourceLocator;

/**
 * Loads all files from the specified directory
 */
final class DirectoriesSourceLocator extends BaseSourceLocator
{
    public function __construct(array $directories)
    {
        parent::__construct();
        $directories = array_map(function (string $directory) {
            if (!is_dir($directory)) {
                throw new \InvalidArgumentException("Directory `{$directory}` not found");
            }
            return realpath($directory);
        }, $directories);
        $this->getFinder()->in($directories)->depth("==0");
    }
}
