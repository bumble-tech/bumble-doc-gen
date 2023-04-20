<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\SourceLocator;

/**
 * Loads one specific file by its path
 */
final class SingleFileSourceLocator extends BaseSourceLocator
{
    public function __construct(string $filename)
    {
        parent::__construct();
        if (!is_file($filename)) {
            throw new \InvalidArgumentException("File `{$filename}` not found");
        }
        $this->getFinder()->append([new \SplFileInfo($filename)]);
    }
}
