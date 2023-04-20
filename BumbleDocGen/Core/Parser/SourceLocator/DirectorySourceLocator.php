<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\SourceLocator;

/**
 * Loads all files from the specified directory
 */
final class DirectorySourceLocator extends BaseSourceLocator
{
    public function __construct(string $directory)
    {
        parent::__construct();
        if (!is_dir($directory)) {
            throw new \InvalidArgumentException("Directory `{$directory}` not found");
        }
        $this->getFinder()->in($directory)->depth("==0");
    }
}
