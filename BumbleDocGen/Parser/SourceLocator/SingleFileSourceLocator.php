<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\SourceLocator;

/**
 * Loads one specific file by its path
 */
final class SingleFileSourceLocator extends BaseSourceLocator
{
    public function __construct(
        string $filename,
        bool   $greedyLoad = true
    )
    {
        parent::__construct($greedyLoad);
        $this->getFinder()->append([new \SplFileInfo($filename)]);
    }
}
