<?php

declare(strict_types=1);

namespace Test\Unit\LanguageHandler\Php\Parser\FilterCondition\PropertyFilterCondition;

use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Property\PropertyEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\PropertyFilterCondition\IsPrivateCondition;
use PHPUnit\Framework\TestCase;

final class IsPrivateConditionTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        \DG\BypassFinals::enable();
    }

    /**
     * @dataProvider providerCanAddToCollection
     */
    public function testCanAddToCollection(bool $isPrivateMethodsResult, bool $expectedResult): void
    {
        $entityStub = $this->createStub(PropertyEntity::class);
        foreach (get_class_methods(PropertyEntity::class) as $classMethod) {
            if (
                !in_array($classMethod, [
                '__construct',
                'isPrivate',
                ])
            ) {
                $entityStub->expects($this->never())->method($classMethod);
            }
        }

        $entityStub->expects($this->once())->method('isPrivate')->willReturn($isPrivateMethodsResult);

        $condition = new IsPrivateCondition();
        self::assertEquals($expectedResult, $condition->canAddToCollection($entityStub));
    }

    public function providerCanAddToCollection(): array
    {
        return [
            "Entity is private" => [
                '$isPrivateMethodsResult' => true,
                '$expectedResult' => true,
            ],
            "Entity is not private" => [
                '$isPrivateMethodsResult' => false,
                '$expectedResult' => false,
            ],
        ];
    }
}
