<?php

declare(strict_types=1);

namespace Test\Unit\Core\Parser\FilterCondition;

use BumbleDocGen\Core\Parser\Entity\EntityInterface;
use BumbleDocGen\Core\Parser\FilterCondition\CommonFilterCondition\FalseCondition;
use BumbleDocGen\Core\Parser\FilterCondition\CommonFilterCondition\TrueCondition;
use BumbleDocGen\Core\Parser\FilterCondition\ConditionGroup;
use BumbleDocGen\Core\Parser\FilterCondition\ConditionGroupTypeEnum;
use PHPUnit\Framework\TestCase;

final class ConditionGroupTest extends TestCase
{
    /**
     * @dataProvider providerCanAddToCollection
     */
    public function testCanAddToCollection(string $conditionGroupType, array $conditionTypes, bool $expectedResult): void
    {
        $entityStub = $this->createStub(EntityInterface::class);

        $conditions = [];
        foreach ($conditionTypes as $conditionType) {
            $conditions[] = $conditionType ? new TrueCondition() : new FalseCondition();
        }

        $conditionGroup = new ConditionGroup($conditionGroupType, ...$conditions);
        self::assertEquals($conditionGroup->canAddToCollection($entityStub), $expectedResult);
    }

    public function providerCanAddToCollection(): array
    {
        return [
            "Empty condition group. AND type" => [
                '$conditionGroupType' => ConditionGroupTypeEnum::AND,
                '$conditions' => [],
                '$expectedResult' => true,
            ],
            "Empty condition group. OR type" => [
                '$conditionGroupType' => ConditionGroupTypeEnum::OR,
                '$conditions' => [],
                '$expectedResult' => false,
            ],
            "Two conditions in a group, one true. AND type" => [
                '$conditionGroupType' => ConditionGroupTypeEnum::AND,
                '$conditions' => [true, false],
                '$expectedResult' => false,
            ],
            "Two conditions in a group, one true. OR type" => [
                '$conditionGroupType' => ConditionGroupTypeEnum::OR,
                '$conditions' => [true, false],
                '$expectedResult' => true,
            ],
            "Two conditions in a group, both true. AND type" => [
                '$conditionGroupType' => ConditionGroupTypeEnum::AND,
                '$conditions' => [true, true],
                '$expectedResult' => true,
            ],
            "Two conditions in a group, both true. OR type" => [
                '$conditionGroupType' => ConditionGroupTypeEnum::OR,
                '$conditions' => [true, true],
                '$expectedResult' => true,
            ],
            "Two conditions in a group, both false. AND type" => [
                '$conditionGroupType' => ConditionGroupTypeEnum::AND,
                '$conditions' => [false, false],
                '$expectedResult' => false,
            ],
            "Two conditions in a group, both false. OR type" => [
                '$conditionGroupType' => ConditionGroupTypeEnum::OR,
                '$conditions' => [false, false],
                '$expectedResult' => false,
            ],
        ];
    }
}
