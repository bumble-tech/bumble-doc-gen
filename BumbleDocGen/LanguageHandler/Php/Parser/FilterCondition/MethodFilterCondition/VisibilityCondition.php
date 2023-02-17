<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\MethodFilterCondition;

use BumbleDocGen\LanguageHandler\Php\Parser\Entity\MethodEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\ClassFilterCondition\VisibilityConditionModifier;
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
