<?php

declare(strict_types=1);

namespace Test\Unit\LanguageHandler\Php\Parser\FilterCondition\MethodFilterCondition;

use BumbleDocGen\LanguageHandler\Php\Parser\Entity\MethodEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\ClassFilterCondition\VisibilityConditionModifier;
use BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\MethodFilterCondition\VisibilityCondition;
use PHPUnit\Framework\TestCase;

final class VisibilityConditionTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        \DG\BypassFinals::enable();
    }

    /**
     * @dataProvider providerCanAddToCollection
     */
    public function testCanAddToCollection(array $visibilityModifiers, array $methodsStubs, bool $expectedResult): void
    {
        $entityStub = $this->createStub(MethodEntity::class);
        foreach (get_class_methods(MethodEntity::class) as $classMethod) {
            if (
                !in_array($classMethod, [
                '__construct',
                'isPublic',
                'isProtected',
                'isPrivate',
                ])
            ) {
                $entityStub->expects($this->never())->method($classMethod);
            }
        }

        if (isset($methodsStubs['isProtected'])) {
            $entityStub->expects($this->once())->method('isProtected')->willReturn($methodsStubs['isProtected']);
        } else {
            $entityStub->expects($this->never())->method('isProtected');
        }

        if (isset($methodsStubs['isPublic'])) {
            $entityStub->expects($this->once())->method('isPublic')->willReturn($methodsStubs['isPublic']);
        } else {
            $entityStub->expects($this->never())->method('isPublic');
        }

        if (isset($methodsStubs['isPrivate'])) {
            $entityStub->expects($this->once())->method('isPrivate')->willReturn($methodsStubs['isPrivate']);
        } else {
            $entityStub->expects($this->never())->method('isPrivate');
        }

        $condition = new VisibilityCondition(...$visibilityModifiers);
        self::assertEquals($expectedResult, $condition->canAddToCollection($entityStub));
    }

    public function providerCanAddToCollection(): array
    {
        return [
            "Without visibility modifiers" => [
                '$visibilityModifiers' => [],
                '$methodsStubs' => [],
                '$expectedResult' => false,
            ],
            "With public visibility modifier. isPublic == false" => [
                '$visibilityModifiers' => [
                    VisibilityConditionModifier::PUBLIC,
                ],
                '$methodsStubs' => [
                    'isPublic' => false,
                ],
                '$expectedResult' => false,
            ],
            "With public visibility modifier. isPublic == true" => [
                '$visibilityModifiers' => [
                    VisibilityConditionModifier::PUBLIC,
                ],
                '$methodsStubs' => [
                    'isPublic' => true,
                ],
                '$expectedResult' => true,
            ],
            "With protected visibility modifier. isProtected == false" => [
                '$visibilityModifiers' => [
                    VisibilityConditionModifier::PROTECTED,
                ],
                '$methodsStubs' => [
                    'isProtected' => false,
                ],
                '$expectedResult' => false,
            ],
            "With protected visibility modifier. isProtected == true" => [
                '$visibilityModifiers' => [
                    VisibilityConditionModifier::PROTECTED,
                ],
                '$methodsStubs' => [
                    'isProtected' => true,
                ],
                '$expectedResult' => true,
            ],
            "With private visibility modifier. isPrivate == false" => [
                '$visibilityModifiers' => [
                    VisibilityConditionModifier::PRIVATE,
                ],
                '$methodsStubs' => [
                    'isPrivate' => false,
                ],
                'isPrivate' => false,
            ],
            "With private visibility modifier. isPrivate == true" => [
                '$visibilityModifiers' => [
                    VisibilityConditionModifier::PRIVATE,
                ],
                '$methodsStubs' => [
                    'isPrivate' => true,
                ],
                'isPrivate' => true,
            ],
            "With visibility modifiers. All == false" => [
                '$visibilityModifiers' => [
                    VisibilityConditionModifier::PUBLIC,
                    VisibilityConditionModifier::PROTECTED,
                    VisibilityConditionModifier::PRIVATE,
                ],
                '$methodsStubs' => [
                    'isPublic' => false,
                    'isProtected' => false,
                    'isPrivate' => false,
                ],
                'isPrivate' => false,
            ],
            "With visibility modifiers. True case 1" => [
                '$visibilityModifiers' => [
                    VisibilityConditionModifier::PUBLIC,
                    VisibilityConditionModifier::PROTECTED,
                    VisibilityConditionModifier::PRIVATE,
                ],
                '$methodsStubs' => [
                    'isPublic' => true,
                ],
                'isPrivate' => true,
            ],
            "With visibility modifiers. True case 2" => [
                '$visibilityModifiers' => [
                    VisibilityConditionModifier::PUBLIC,
                    VisibilityConditionModifier::PROTECTED,
                    VisibilityConditionModifier::PRIVATE,
                ],
                '$methodsStubs' => [
                    'isPublic' => false,
                    'isProtected' => true,
                ],
                'isPrivate' => true,
            ],
        ];
    }
}
