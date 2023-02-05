<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\FilterCondition\PropertyFilterCondition;

use BumbleDocGen\Parser\Entity\PropertyEntity;
use BumbleDocGen\Parser\FilterCondition\CommonFilterCondition\VisibilityConditionModifier;
use BumbleDocGen\Parser\FilterCondition\ConditionInterface;

/**
 * Property access modifier check
 */
final class VisibilityCondition implements ConditionInterface
{
    public function __construct(
        private PropertyEntity $propertyEntity,
        private string         $visibilityModifier = VisibilityConditionModifier::PUBLIC
    )
    {
    }

    public function canAddToCollection(): bool
    {
        return match ($this->visibilityModifier) {
            VisibilityConditionModifier::PUBLIC => $this->propertyEntity->isPublic(),
            VisibilityConditionModifier::PROTECTED => $this->propertyEntity->isProtected(),
            VisibilityConditionModifier::PRIVATE => $this->propertyEntity->isPrivate(),
            VisibilityConditionModifier::NONE => false
        };
    }
}
