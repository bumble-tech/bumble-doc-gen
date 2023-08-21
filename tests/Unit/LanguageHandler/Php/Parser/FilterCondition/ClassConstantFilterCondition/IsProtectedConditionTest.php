<?php

declare(strict_types=1);

namespace Test\Unit\LanguageHandler\Php\Parser\FilterCondition\ClassConstantFilterCondition;

use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ConstantEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\ClassConstantFilterCondition\IsProtectedCondition;
use PHPUnit\Framework\TestCase;

final class IsProtectedConditionTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        \DG\BypassFinals::enable();
    }

    /**
     * @dataProvider providerCanAddToCollection
     */
    public function testCanAddToCollection(bool $isProtectedMethodsResult, bool $expectedResult): void
    {
        $entityStub = $this->createStub(ConstantEntity::class);
        foreach (get_class_methods(ConstantEntity::class) as $classMethod) {
            if (!in_array($classMethod, [
                '__construct',
                'isProtected',
            ])) {
                $entityStub->expects($this->never())->method($classMethod);
            }
        }

        $entityStub->expects($this->once())->method('isProtected')->willReturn($isProtectedMethodsResult);

        $condition = new IsProtectedCondition();
        self::assertEquals($expectedResult, $condition->canAddToCollection($entityStub));
    }

    public function providerCanAddToCollection(): array
    {
        return [
            "Entity is protected" => [
                '$isProtectedMethodsResult' => true,
                '$expectedResult' => true,
            ],
            "Entity is not protected" => [
                '$isProtectedMethodsResult' => false,
                '$expectedResult' => false,
            ],
        ];
    }
}
