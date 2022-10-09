<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\FilterCondition\ClassFilterCondition;

use BumbleDocGen\Parser\Entity\ClassEntity;
use BumbleDocGen\Parser\FilterCondition\ConditionInterface;

/**
 * Checking for an attribute on a class
 */
final class HasAttributeCondition implements ConditionInterface
{
    public function __construct(
        private ClassEntity $classEntity,
        private string $className
    ) {
    }

    public function canAddToCollection(): bool
    {
        return $this->classEntity->getAttributeParser()->hasAttributeIfIsSubclassOf(
            $this->classEntity->getReflection(),
            $this->className
        );
    }
}
