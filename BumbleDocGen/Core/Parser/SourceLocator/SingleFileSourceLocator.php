<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\SourceLocator;

/**
 * Loads one specific file by its path
 */
final class SingleFileSourceLocator extends BaseSourceLocator
{
    public function __construct(
        string $filename
    )
    {
        parent::__construct();
        $this->getFinder()->append([new \SplFileInfo($filename)]);
    }
}
