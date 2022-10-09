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
        private VisibilityConditionModifier $visibilityModifier = VisibilityConditionModifier::PUBLIC
    ) {
    }

    public function canAddToCollection(): bool
    {
        $reflectionProperty = $this->propertyEntity->getReflection();
        return match ($this->visibilityModifier) {
            VisibilityConditionModifier::PUBLIC => $reflectionProperty->isPublic(),
            VisibilityConditionModifier::PROTECTED => $reflectionProperty->isProtected(),
            VisibilityConditionModifier::PRIVATE => $reflectionProperty->isPrivate(),
            VisibilityConditionModifier::NONE => false
        };
    }
}
