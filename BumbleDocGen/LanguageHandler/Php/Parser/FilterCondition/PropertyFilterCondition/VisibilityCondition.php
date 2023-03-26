<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\PropertyFilterCondition;

use BumbleDocGen\Core\Parser\Entity\EntityInterface;
use BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\PropertyEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\ClassFilterCondition\VisibilityConditionModifier;

/**
 * Property access modifier check
 */
final class VisibilityCondition implements ConditionInterface
{
    public function __construct(private string $visibilityModifier = VisibilityConditionModifier::PUBLIC)
    {
    }

    public function canAddToCollection(EntityInterface $entity): bool
    {
        if (!$entity instanceof PropertyEntity) {
            return false;
        }
        return match ($this->visibilityModifier) {
            VisibilityConditionModifier::PUBLIC => $entity->isPublic(),
            VisibilityConditionModifier::PROTECTED => $entity->isProtected(),
            VisibilityConditionModifier::PRIVATE => $entity->isPrivate(),
            VisibilityConditionModifier::NONE => false
        };
    }
}
