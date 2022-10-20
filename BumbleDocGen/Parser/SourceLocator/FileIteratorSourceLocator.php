<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\SourceLocator;

use BumbleDocGen\Parser\SourceLocator\Internal\CachedSourceLocator;
use Psr\Cache\CacheItemPoolInterface;
use Roave\BetterReflection\SourceLocator\Ast\Locator;
use Roave\BetterReflection\SourceLocator\Type\MemoizingSourceLocator;
use Roave\BetterReflection\SourceLocator\Type\SourceLocator;

/**
 * Loads all files using an iterator
 */
final class FileIteratorSourceLocator implements SourceLocatorInterface
{
    public function __construct(private \Iterator $fileInfoIterator, private ?CacheItemPoolInterface $cache = null)
    {
    }

    public function getFiles(): \Generator
    {
        foreach ($this->fileInfoIterator as $file) {
            /** @var \SplFileInfo $file */
            yield $file;
        }
    }

    public function convertToReflectorSourceLocator(Locator $astLocator): SourceLocator
    {
        $fileIteratorSourceLocator = new \Roave\BetterReflection\SourceLocator\Type\FileIteratorSourceLocator(
            $this->fileInfoIterator, $astLocator
        );

        if ($this->cache) {
            return new CachedSourceLocator($fileIteratorSourceLocator, $this->cache);
        }

        return new MemoizingSourceLocator($fileIteratorSourceLocator);
    }
}
