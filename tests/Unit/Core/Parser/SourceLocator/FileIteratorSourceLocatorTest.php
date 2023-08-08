<?php

declare(strict_types=1);

namespace Test\Unit\Core\Parser\SourceLocator;

use Test\Framework\CustomTestCase\SourceLocatorTestCase;
use BumbleDocGen\Core\Parser\SourceLocator\FileIteratorSourceLocator;

final class FileIteratorSourceLocatorTest extends SourceLocatorTestCase
{
    public function testGetFinder(): void
    {
        $iterator = new \FilesystemIterator(__DIR__);
        $expected = $this->createBaseFinder()->append($iterator);
        $fileIteratorSourceLocator = new FileIteratorSourceLocator($iterator);

        self::assertEquals($expected, $fileIteratorSourceLocator->getFinder());
    }
}
