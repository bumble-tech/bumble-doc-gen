<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\MethodFilterCondition;

use BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\MethodEntity;

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
