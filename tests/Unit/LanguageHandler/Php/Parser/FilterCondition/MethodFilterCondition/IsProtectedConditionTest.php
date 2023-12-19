<?php

declare(strict_types=1);

namespace Test\Unit\LanguageHandler\Php\Parser\FilterCondition\MethodFilterCondition;

use BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\MethodFilterCondition\IsProtectedCondition;
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
        $entityStub = $this->createStub(MethodEntity::class);
        foreach (get_class_methods(MethodEntity::class) as $classMethod) {
            if (
                !in_array($classMethod, [
                '__construct',
                'isProtected',
                ])
            ) {
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
