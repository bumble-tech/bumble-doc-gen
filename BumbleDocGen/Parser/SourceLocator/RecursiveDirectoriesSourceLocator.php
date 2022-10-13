<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\SourceLocator;

use BumbleDocGen\Parser\SourceLocator\Internal\CachedSourceLocator;
use FilesystemIterator;
use Roave\BetterReflection\SourceLocator\Ast\Locator;
use Roave\BetterReflection\SourceLocator\Type\MemoizingSourceLocator;
use Roave\BetterReflection\SourceLocator\Type\SourceLocator;
use Symfony\Component\Finder\Iterator\ExcludeDirectoryFilterIterator;

/**
 * Loads all files from the specified directories, which are traversed recursively
 */
final class RecursiveDirectoriesSourceLocator implements SourceLocatorInterface
{
    public function __construct(
        private array $directories,
        private array $exclude = [],
        private ?string $cacheDirName = null
    ) {
    }

    private function getDirectoryIterator(): \Iterator
    {
        $iterator = new \AppendIterator();
        foreach ($this->directories as $directory) {
            if (is_dir($directory)) {
                $iterator->append(
                    new \RecursiveIteratorIterator(
                        new \RecursiveDirectoryIterator(
                            $directory, FilesystemIterator::SKIP_DOTS
                        )
                    )
                );
            }
        }
        return $iterator;
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
            new ExcludeDirectoryFilterIterator($this->getDirectoryIterator(), $this->exclude), $astLocator
        );

        if ($this->cacheDirName) {
            return new CachedSourceLocator($fileIteratorSourceLocator, $this->cacheDirName);
        }

        return new MemoizingSourceLocator($fileIteratorSourceLocator);
    }
}
