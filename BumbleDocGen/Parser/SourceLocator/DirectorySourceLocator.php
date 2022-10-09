<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\SourceLocator;

use Roave\BetterReflection\SourceLocator\Ast\Locator;
use Roave\BetterReflection\SourceLocator\Type\MemoizingSourceLocator;
use Roave\BetterReflection\SourceLocator\Type\SourceLocator;

/**
 * Loads all files from the specified directory
 */
final class DirectorySourceLocator implements SourceLocatorInterface
{
    public function __construct(private string $directory)
    {
    }

    public function convertToReflectorSourceLocator(Locator $astLocator): SourceLocator
    {
        return new MemoizingSourceLocator(
            new \Roave\BetterReflection\SourceLocator\Type\FileIteratorSourceLocator(
                new \IteratorIterator(
                    new \RecursiveDirectoryIterator($this->directory, \FilesystemIterator::SKIP_DOTS)
                ), $astLocator
            )
        );
    }
}
