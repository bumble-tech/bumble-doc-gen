<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\SourceLocator;

/**
 * Loads all files from the specified directory
 */
final class DirectorySourceLocator extends BaseSourceLocator
{
    public function __construct(
        string $directory
    ) {
        parent::__construct();
        $this->getFinder()->in($directory)->depth("==0");
    }
}
