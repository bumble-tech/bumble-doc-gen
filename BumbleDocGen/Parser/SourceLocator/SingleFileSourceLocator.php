<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\SourceLocator;

use BumbleDocGen\Parser\SourceLocator\Internal\CachedSourceLocator;
use Roave\BetterReflection\SourceLocator\Ast\Locator;
use Roave\BetterReflection\SourceLocator\Type\MemoizingSourceLocator;
use Roave\BetterReflection\SourceLocator\Type\SourceLocator;

/**
 * Loads one specific file by its path
 */
final class SingleFileSourceLocator implements SourceLocatorInterface
{
    public function __construct(
        private string $filename,
        private ?string $cacheDirName = null
    ) {
    }

    public function getFiles(): \Generator
    {
        yield new \SplFileInfo($this->filename);
    }

    public function convertToReflectorSourceLocator(Locator $astLocator): SourceLocator
    {
        $singleFileSourceLocator = new \Roave\BetterReflection\SourceLocator\Type\SingleFileSourceLocator(
            $this->filename, $astLocator
        );

        if ($this->cacheDirName) {
            return new CachedSourceLocator($singleFileSourceLocator, $this->cacheDirName);
        }

        return new MemoizingSourceLocator($singleFileSourceLocator);
    }
}
