<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\SourceLocator;

use FilesystemIterator;
use Roave\BetterReflection\SourceLocator\Ast\Locator;
use Roave\BetterReflection\SourceLocator\Type\MemoizingSourceLocator;
use Roave\BetterReflection\SourceLocator\Type\SourceLocator;
use Symfony\Component\Finder\Iterator\ExcludeDirectoryFilterIterator;

final class RecursiveDirectoriesSourceLocator implements SourceLocatorInterface
{
    public function __construct(private array $directories, private array $exclude = [])
    {
    }

    public function convertToReflectorSourceLocator(Locator $astLocator): SourceLocator
    {
        $iterator = new \AppendIterator();
        foreach ($this->directories as $directory) {
            $iterator->append(
                new \RecursiveIteratorIterator(
                    new \RecursiveDirectoryIterator(
                        $directory, FilesystemIterator::SKIP_DOTS
                    )
                )
            );
        }
        return new MemoizingSourceLocator(
            new \Roave\BetterReflection\SourceLocator\Type\FileIteratorSourceLocator(
                new ExcludeDirectoryFilterIterator($iterator, $this->exclude), $astLocator
            )
        );
    }
}
