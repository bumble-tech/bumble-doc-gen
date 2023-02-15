<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\SourceLocator;

use Roave\BetterReflection\SourceLocator\Ast\Locator;
use Roave\BetterReflection\SourceLocator\Type\SourceLocator;
use Symfony\Component\Finder\Finder;

abstract class BaseSourceLocator implements SourceLocatorInterface
{
    private Finder $finder;

    public function __construct(private bool $greedyLoad = true)
    {
        $this->finder = new Finder();
        $this->finder->ignoreDotFiles(true)->ignoreVCSIgnored(true)->ignoreVCS(true)->files();
    }

    protected function getIterator(): \Iterator
    {
        return new \ArrayIterator(iterator_to_array($this->getFinder()->getIterator()));
    }

    public function getFinder(): Finder
    {
        return $this->finder;
    }

    public function convertToReflectorSourceLocator(Locator $astLocator): ?SourceLocator
    {
        if (!$this->greedyLoad) {
            return null;
        }
        return new \Roave\BetterReflection\SourceLocator\Type\FileIteratorSourceLocator(
            $this->getIterator(), $astLocator
        );
    }
}
