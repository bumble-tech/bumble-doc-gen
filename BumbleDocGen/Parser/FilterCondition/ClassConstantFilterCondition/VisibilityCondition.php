<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\FilterCondition\ClassConstantFilterCondition;

use BumbleDocGen\Parser\Entity\ConstantEntity;
use BumbleDocGen\Parser\FilterCondition\CommonFilterCondition\VisibilityConditionModifier;
use BumbleDocGen\Parser\FilterCondition\ConditionInterface;

/**
 * Constant access modifier check
 */
final class VisibilityCondition implements ConditionInterface
{
    public function __construct(
        private ConstantEntity $constantEntity,
        private VisibilityConditionModifier $visibilityModifier = VisibilityConditionModifier::PUBLIC
    ) {
    }

    public function canAddToCollection(): bool
    {
        $reflectionClassConstant = $this->constantEntity->getReflection();
        return match ($this->visibilityModifier) {
            VisibilityConditionModifier::PUBLIC => $reflectionClassConstant->isPublic(),
            VisibilityConditionModifier::PROTECTED => $reflectionClassConstant->isProtected(),
            VisibilityConditionModifier::PRIVATE => $reflectionClassConstant->isPrivate(),
            VisibilityConditionModifier::NONE => false
        };
    }
}
