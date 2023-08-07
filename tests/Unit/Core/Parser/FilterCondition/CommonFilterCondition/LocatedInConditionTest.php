<?php

declare(strict_types=1);

namespace Test\Unit\Core\Parser\FilterCondition\CommonFilterCondition;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\ConfigurationParameterBag;
use BumbleDocGen\Core\Parser\Entity\EntityInterface;
use BumbleDocGen\Core\Parser\FilterCondition\CommonFilterCondition\LocatedInCondition;
use PHPUnit\Framework\TestCase;

final class LocatedInConditionTest extends TestCase
{
    private const TEST_PROJECT_ROOT = __DIR__ . '/../..'; // root dir: FilterCondition/*
    private const TEST_ENTITY_FILEPATH = self::TEST_PROJECT_ROOT . '/FilterCondition/CommonFilterCondition/LocatedInConditionTest.php';

    public static function setUpBeforeClass(): void
    {
        \DG\BypassFinals::enable();
    }

    /**
     * @dataProvider providerCanAddToCollection
     */
    public function testCanAddToCollection(array $locatedInDirectories, bool $expectedResult): void
    {
        $entityStub = $this->createStub(EntityInterface::class);
        foreach (get_class_methods(EntityInterface::class) as $classMethod) {
            if ($classMethod === 'getAbsoluteFileName') {
                $entityStub->expects($this->once())->method('getAbsoluteFileName')->willReturn(self::TEST_ENTITY_FILEPATH);
                continue;
            }
            $entityStub->expects($this->never())->method($classMethod);
        }

        $configurationStub = $this->createStub(Configuration::class);
        $configurationStub->expects($this->any())->method('getProjectRoot')->willReturn(self::TEST_PROJECT_ROOT);

        $configurationParameterBagStub = $this->createStub(ConfigurationParameterBag::class);
        $configurationParameterBagStub
            ->expects($this->any())
            ->method('resolveValue')
            ->willReturnCallback(fn($arg) => str_replace(
                '%project_root%',
                self::TEST_PROJECT_ROOT,
                $arg
            ));

        $condition = new LocatedInCondition($configurationStub, $configurationParameterBagStub, $locatedInDirectories);
        self::assertEquals($expectedResult, $condition->canAddToCollection($entityStub));
    }

    public function providerCanAddToCollection(): array
    {
        return [
            "Without search directories" => [
                '$locatedInDirectories' => [],
                '$expectedResult' => false,
            ],
            "Several non-existent directories" => [
                '$locatedInDirectories' => [
                    'some/dir',
                    'some/dir2',
                ],
                '$expectedResult' => false,
            ],
            "Several non-existent directories and one relative search path" => [
                '$locatedInDirectories' => [
                    'some/dir',
                    'some/dir2',
                    'FilterCondition/CommonFilterCondition',
                ],
                '$expectedResult' => true,
            ],
            "Relative search path" => [
                '$locatedInDirectories' => [
                    'FilterCondition',
                ],
                '$expectedResult' => true,
            ],
            "Absolute path to non-existent search directory" => [
                '$locatedInDirectories' => [
                    '/FilterCondition',
                ],
                '$expectedResult' => false,
            ],
            "Absolute path to existent search directory" => [
                '$locatedInDirectories' => [
                    self::TEST_PROJECT_ROOT . '/FilterCondition',
                ],
                '$expectedResult' => true,
            ],
            "Path with shortcode to an existing directory" => [
                '$locatedInDirectories' => [
                    '%project_root%/FilterCondition',
                ],
                '$expectedResult' => true,
            ],
        ];
    }
}
