<?php

declare(strict_types=1);

namespace Test\Unit\Core\Parser\FilterCondition\CommonFilterCondition;

use BumbleDocGen\Core\Parser\Entity\EntityInterface;
use BumbleDocGen\Core\Parser\FilterCondition\CommonFilterCondition\TrueCondition;
use PHPUnit\Framework\TestCase;

final class TrueConditionTest extends TestCase
{
    public function testCanAddToCollection(): void
    {
        $entityStub = $this->createStub(EntityInterface::class);
        foreach (get_class_methods(EntityInterface::class) as $classMethod) {
            $entityStub->expects($this->never())->method($classMethod);
        }

        $condition = new TrueCondition();
        self::assertTrue($condition->canAddToCollection($entityStub));
    }
}
