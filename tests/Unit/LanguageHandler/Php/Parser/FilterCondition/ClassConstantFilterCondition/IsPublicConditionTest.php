<?php

declare(strict_types=1);

namespace Test\Unit\LanguageHandler\Php\Parser\FilterCondition\ClassConstantFilterCondition;

use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ConstantEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\ClassConstantFilterCondition\IsPublicCondition;
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
        $entityStub = $this->createStub(ConstantEntity::class);
        foreach (get_class_methods(ConstantEntity::class) as $classMethod) {
            if (
                !in_array($classMethod, [
                '__construct',
                'isPublic',
                ])
            ) {
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
