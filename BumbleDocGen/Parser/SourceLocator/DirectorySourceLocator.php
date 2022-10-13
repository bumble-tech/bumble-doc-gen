<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\SourceLocator;

use BumbleDocGen\Parser\SourceLocator\Internal\CachedSourceLocator;
use Roave\BetterReflection\SourceLocator\Ast\Locator;
use Roave\BetterReflection\SourceLocator\Type\MemoizingSourceLocator;
use Roave\BetterReflection\SourceLocator\Type\SourceLocator;

/**
 * Loads all files from the specified directory
 */
final class DirectorySourceLocator implements SourceLocatorInterface
{
    public function __construct(
        private string $directory,
        private ?string $cacheDirName = null
    ) {
    }

    private function getDirectoryIterator(): \Iterator
    {
        return new \IteratorIterator(
            new \RecursiveDirectoryIterator($this->directory, \FilesystemIterator::SKIP_DOTS)
        );
    }

    public function getFiles(): \Generator
    {
        foreach ($this->getDirectoryIterator() as $file) {
            /** @var \SplFileInfo $file */
            yield $file;
        }
    }

    public function convertToReflectorSourceLocator(Locator $astLocator): SourceLocator
    {
        $fileIteratorSourceLocator = new \Roave\BetterReflection\SourceLocator\Type\FileIteratorSourceLocator(
            new \IteratorIterator(
                new \RecursiveDirectoryIterator($this->directory, \FilesystemIterator::SKIP_DOTS)
            ), $astLocator
        );

        if ($this->cacheDirName) {
            return new CachedSourceLocator($fileIteratorSourceLocator, $this->cacheDirName);
        }

        return new MemoizingSourceLocator($fileIteratorSourceLocator);
    }
}
