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
        private string       $visibilityModifier = VisibilityConditionModifier::PUBLIC
    )
    {
    }

    public function canAddToCollection(): bool
    {
        return match ($this->visibilityModifier) {
            VisibilityConditionModifier::PUBLIC => $this->methodEntity->isPublic(),
            VisibilityConditionModifier::PROTECTED => $this->methodEntity->isProtected(),
            VisibilityConditionModifier::PRIVATE => $this->methodEntity->isPrivate(),
            VisibilityConditionModifier::NONE => false
        };
    }
}
