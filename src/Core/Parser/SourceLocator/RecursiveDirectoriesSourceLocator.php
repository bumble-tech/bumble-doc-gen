<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\SourceLocator;

/**
 * Loads all files from the specified directories, which are traversed recursively
 */
final class RecursiveDirectoriesSourceLocator extends BaseSourceLocator
{
    public function __construct(
        array $directories,
        array $exclude = [],
        bool $abortExecutionIfPartOfDirsNotExists = true,
    ) {
        parent::__construct();

        if (!$abortExecutionIfPartOfDirsNotExists) {
            $directories = array_filter($directories, 'is_dir');
            if (!$directories) {
                throw new \InvalidArgumentException("All specified directories do not exist");
            }
        }

        $directories = array_map(function (string $directory) {
            if (!is_dir($directory)) {
                throw new \InvalidArgumentException("Directory `{$directory}` not found");
            }
            return realpath($directory);
        }, $directories);
        $this->getFinder()->in($directories)->exclude($exclude);
    }
}
