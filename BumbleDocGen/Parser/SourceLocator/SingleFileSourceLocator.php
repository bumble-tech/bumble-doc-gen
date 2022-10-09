<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\SourceLocator;

use Roave\BetterReflection\SourceLocator\Ast\Locator;
use Roave\BetterReflection\SourceLocator\Type\MemoizingSourceLocator;
use Roave\BetterReflection\SourceLocator\Type\SourceLocator;

/**
 * Loads one specific file by its path
 */
final class SingleFileSourceLocator implements SourceLocatorInterface
{
    public function __construct(private string $filename)
    {
    }

    public function convertToReflectorSourceLocator(Locator $astLocator): SourceLocator
    {
        return new MemoizingSourceLocator(
            new \Roave\BetterReflection\SourceLocator\Type\SingleFileSourceLocator(
                $this->filename, $astLocator
            )
        );
    }
}
