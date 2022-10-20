<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\SourceLocator;

use BumbleDocGen\Parser\SourceLocator\Internal\CachedSourceLocator;
use Psr\Cache\CacheItemPoolInterface;
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
        private ?CacheItemPoolInterface $cache = null
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

        if ($this->cache) {
            return new CachedSourceLocator($singleFileSourceLocator, $this->cache);
        }

        return new MemoizingSourceLocator($singleFileSourceLocator);
    }
}
