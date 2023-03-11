<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\SourceLocator;

use Symfony\Component\Finder\Finder;

abstract class BaseSourceLocator implements SourceLocatorInterface
{
    private Finder $finder;

    public function __construct()
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
}
