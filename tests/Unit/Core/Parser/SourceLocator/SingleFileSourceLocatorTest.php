<?php

declare(strict_types=1);

namespace Test\Unit\Core\Parser\SourceLocator;

use BumbleDocGen\Core\Parser\SourceLocator\SingleFileSourceLocator;
use Test\Framework\CustomTestCase\SourceLocatorTestCase;

final class SingleFileSourceLocatorTest extends SourceLocatorTestCase
{
    public function testGetFinder(): void
    {
        $filename = __FILE__;
        $expected = $this->createBaseFinder()->append([new \SplFileInfo($filename)]);
        $fileIteratorSourceLocator = new SingleFileSourceLocator($filename);

        self::assertEquals($expected, $fileIteratorSourceLocator->getFinder());
    }
}
