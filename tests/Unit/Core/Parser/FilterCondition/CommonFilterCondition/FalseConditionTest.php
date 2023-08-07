<?php

declare(strict_types=1);

namespace Test\Unit\Core\Parser\FilterCondition\CommonFilterCondition;

use BumbleDocGen\Core\Parser\Entity\EntityInterface;
use BumbleDocGen\Core\Parser\FilterCondition\CommonFilterCondition\FalseCondition;
use PHPUnit\Framework\TestCase;

final class FalseConditionTest extends TestCase
{
    public function testCanAddToCollection(): void
    {
        $entityStub = $this->createStub(EntityInterface::class);
        foreach (get_class_methods(EntityInterface::class) as $classMethod) {
            $entityStub->expects($this->never())->method($classMethod);
        }

        $falseCondition = new FalseCondition();
        self::assertFalse($falseCondition->canAddToCollection($entityStub));
    }
}
