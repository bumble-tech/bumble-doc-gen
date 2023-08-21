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

    public function getFinder(): Finder
    {
        return $this->finder;
    }
}
