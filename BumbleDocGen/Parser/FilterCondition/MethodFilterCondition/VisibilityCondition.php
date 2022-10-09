<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\FilterCondition\MethodFilterCondition;

use BumbleDocGen\Parser\Entity\MethodEntity;
use BumbleDocGen\Parser\FilterCondition\CommonFilterCondition\VisibilityConditionModifier;
use BumbleDocGen\Parser\FilterCondition\ConditionInterface;

/**
 * Method access modifier check
 */
final class VisibilityCondition implements ConditionInterface
{
    public function __construct(
        private MethodEntity $methodEntity,
        private VisibilityConditionModifier $visibilityModifier = VisibilityConditionModifier::PUBLIC
    ) {
    }

    public function canAddToCollection(): bool
    {
        $reflectionMethod = $this->methodEntity->getReflection();
        return match ($this->visibilityModifier) {
            VisibilityConditionModifier::PUBLIC => $reflectionMethod->isPublic(),
            VisibilityConditionModifier::PROTECTED => $reflectionMethod->isProtected(),
            VisibilityConditionModifier::PRIVATE => $reflectionMethod->isPrivate(),
            VisibilityConditionModifier::NONE => false
        };
    }
}
