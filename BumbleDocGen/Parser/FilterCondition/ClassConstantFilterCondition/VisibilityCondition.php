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
        private string         $visibilityModifier = VisibilityConditionModifier::PUBLIC
    )
    {
    }

    public function canAddToCollection(): bool
    {
        return match ($this->visibilityModifier) {
            VisibilityConditionModifier::PUBLIC => $this->constantEntity->isPublic(),
            VisibilityConditionModifier::PROTECTED => $this->constantEntity->isProtected(),
            VisibilityConditionModifier::PRIVATE => $this->constantEntity->isPrivate(),
            VisibilityConditionModifier::NONE => false
        };
    }
}
