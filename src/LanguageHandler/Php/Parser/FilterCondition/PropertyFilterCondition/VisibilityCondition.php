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
    private array $visibilityModifiers;

    public function __construct(string ...$visibilityModifiers)
    {
        $this->visibilityModifiers = $visibilityModifiers;
    }

    public function canAddToCollection(EntityInterface $entity): bool
    {
        if (!$entity instanceof PropertyEntity) {
            return false;
        }
        foreach ($this->visibilityModifiers as $visibilityModifier) {
            if (
                match ($visibilityModifier) {
                VisibilityConditionModifier::PUBLIC => $entity->isPublic(),
                VisibilityConditionModifier::PROTECTED => $entity->isProtected(),
                VisibilityConditionModifier::PRIVATE => $entity->isPrivate(),
                VisibilityConditionModifier::NONE => false
                }
            ) {
                return true;
            }
        }
        return false;
    }
}
