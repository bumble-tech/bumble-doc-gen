<?php

declare(strict_types=1);

namespace Test\Unit\LanguageHandler\Php\Parser\FilterCondition\MethodFilterCondition;

use BumbleDocGen\LanguageHandler\Php\Parser\Entity\MethodEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\MethodFilterCondition\IsPublicCondition;
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
        $entityStub = $this->createStub(MethodEntity::class);
        foreach (get_class_methods(MethodEntity::class) as $classMethod) {
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
