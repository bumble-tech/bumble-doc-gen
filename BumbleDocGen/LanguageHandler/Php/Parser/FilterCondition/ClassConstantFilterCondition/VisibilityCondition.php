<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\ClassConstantFilterCondition;

use BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ConstantEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\ClassFilterCondition\VisibilityConditionModifier;

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
