<?php

declare(strict_types=1);

namespace Test\Unit\Core\Parser\SourceLocator;

use BumbleDocGen\Core\Parser\SourceLocator\DirectoriesSourceLocator;
use Test\Framework\CustomTestCase\SourceLocatorTestCase;

final class DirectoriesSourceLocatorTest extends SourceLocatorTestCase
{
    /**
     * @dataProvider providerGetFinder
     */
    public function testGetFinder(array $inputDirs, array $outputDirs, ?string $expectExceptionMessage = null): void
    {
        $expected = $this->createBaseFinder()->depth("==0")->in($inputDirs);
        if (!is_null($expectExceptionMessage)) {
            self::expectExceptionMessage($expectExceptionMessage);
        }

        $directoriesSourceLocator = new DirectoriesSourceLocator($outputDirs);
        self::assertEquals($expected, $directoriesSourceLocator->getFinder());
    }

    public function providerGetFinder(): array
    {
        return [
            "Without dirs" => [
                '$inputDirs' => [],
                '$outputDirs' => [],
            ],
            "Exists dir" => [
                '$inputDirs' => [
                    __DIR__,
                ],
                '$outputDirs' => [
                    __DIR__,
                ],
            ],
            "Non-exists dir" => [
                '$inputDirs' => [],
                '$outputDirs' => [
                    __DIR__ . '/2'
                ],
                '$expectExceptionMessage' => 'Directory `' . __DIR__ . '/2' . '` not found',
            ],
        ];
    }
}
