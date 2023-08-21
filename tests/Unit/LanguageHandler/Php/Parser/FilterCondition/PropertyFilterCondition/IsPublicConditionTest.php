<?php

declare(strict_types=1);

namespace Test\Unit\LanguageHandler\Php\Parser\FilterCondition\PropertyFilterCondition;

use BumbleDocGen\LanguageHandler\Php\Parser\Entity\PropertyEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\PropertyFilterCondition\IsPublicCondition;
use PHPUnit\Framework\TestCase;

final class IsPublicConditionTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        \DG\BypassFinals::enable();
    }

    /**
     * @dataProvider providerCanAddToCollection
     */
    public function testCanAddToCollection(bool $isPublicMethodsResult, bool $expectedResult): void
    {
        $entityStub = $this->createStub(PropertyEntity::class);
        foreach (get_class_methods(PropertyEntity::class) as $classMethod) {
            if (!in_array($classMethod, [
                '__construct',
                'isPublic',
            ])) {
                $entityStub->expects($this->never())->method($classMethod);
            }
        }

        $entityStub->expects($this->once())->method('isPublic')->willReturn($isPublicMethodsResult);

        $condition = new IsPublicCondition();
        self::assertEquals($expectedResult, $condition->canAddToCollection($entityStub));
    }

    public function providerCanAddToCollection(): array
    {
        return [
            "Entity is public" => [
                '$isPublicMethodsResult' => true,
                '$expectedResult' => true,
            ],
            "Entity is not public" => [
                '$isPublicMethodsResult' => false,
                '$expectedResult' => false,
            ],
        ];
    }
}
