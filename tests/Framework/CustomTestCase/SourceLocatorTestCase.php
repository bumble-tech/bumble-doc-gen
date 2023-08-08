<?php

declare(strict_types=1);

namespace Framework\CustomTestCase;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Finder\Finder;

abstract class SourceLocatorTestCase extends TestCase
{
    public function createBaseFinder(): Finder
    {
        return (new Finder())
            ->ignoreDotFiles(true)
            ->ignoreVCSIgnored(true)
            ->ignoreVCS(true)
            ->files()
            ->depth("==0");
    }
}
