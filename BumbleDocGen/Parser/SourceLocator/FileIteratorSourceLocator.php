<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\SourceLocator;

use Roave\BetterReflection\SourceLocator\Ast\Locator;
use Roave\BetterReflection\SourceLocator\Type\MemoizingSourceLocator;
use Roave\BetterReflection\SourceLocator\Type\SourceLocator;

/**
 * Loads all files using an iterator
 */
final class FileIteratorSourceLocator implements SourceLocatorInterface
{
    public function __construct(private \Iterator $fileInfoIterator)
    {
    }

    public function convertToReflectorSourceLocator(Locator $astLocator): SourceLocator
    {
        return new MemoizingSourceLocator(
            new \Roave\BetterReflection\SourceLocator\Type\FileIteratorSourceLocator(
                $this->fileInfoIterator, $astLocator
            )
        );
    }
}
