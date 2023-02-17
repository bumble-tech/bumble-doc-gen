<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\FilterCondition\MethodFilterCondition;

use BumbleDocGen\LanguageHandler\Php\Parser\Entity\MethodEntity;
use BumbleDocGen\Parser\FilterCondition\ConditionInterface;

/**
 * Only methods that belong to the current class (not parent)
 */
final class OnlyFromCurrentClassCondition implements ConditionInterface
{

    public function __construct(
        private MethodEntity $methodEntity
    ) {
    }

    public function canAddToCollection(): bool
    {
        return !$this->methodEntity->isImplementedInParentClass();
    }
}
