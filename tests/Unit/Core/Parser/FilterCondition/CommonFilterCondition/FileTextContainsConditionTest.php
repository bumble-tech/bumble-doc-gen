<?php

declare(strict_types=1);

namespace Test\Unit\Core\Parser\FilterCondition\CommonFilterCondition;

use BumbleDocGen\Core\Parser\Entity\EntityInterface;
use BumbleDocGen\Core\Parser\Entity\RootEntityInterface;
use BumbleDocGen\Core\Parser\FilterCondition\CommonFilterCondition\FileTextContainsCondition;
use PHPUnit\Framework\TestCase;

final class FileTextContainsConditionTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        \DG\BypassFinals::enable();
    }

    public function testCanAddToCollectionEntityType(): void
    {
        $entity1Stub = $this->createStub(RootEntityInterface::class);
        $entity1Stub->expects($this->once())->method('getFileContent')->willReturn("some search text");

        // Root entity
        $condition = new FileTextContainsCondition('search text');
        self::assertTrue($condition->canAddToCollection($entity1Stub));

        // Not a root entity
        $entity2Stub = $this->createStub(EntityInterface::class);
        self::assertFalse($condition->canAddToCollection($entity2Stub));
    }

    /**
     * @dataProvider providerCanAddToCollection
     */
    public function testCanAddToCollection(string $substring, bool $expectedResult): void
    {
        $entityStub = $this->createStub(RootEntityInterface::class);
        foreach (get_class_methods(RootEntityInterface::class) as $classMethod) {
            if ($classMethod === 'getFileContent') {
                $entityStub->expects($this->once())->method('getFileContent')->willReturn("some search text");
                continue;
            }
            $entityStub->expects($this->never())->method($classMethod);
        }

        $falseCondition = new FileTextContainsCondition($substring);
        self::assertEquals($falseCondition->canAddToCollection($entityStub), $expectedResult);
    }

    public function providerCanAddToCollection(): array
    {
        return [
            "Substring not found" => [
                '$substring' => 'SEARCH TEXT',
                '$expectedResult' => false,
            ],
            "Substring found" => [
                '$substring' => 'search text',
                '$expectedResult' => true,
            ],
        ];
    }
}
