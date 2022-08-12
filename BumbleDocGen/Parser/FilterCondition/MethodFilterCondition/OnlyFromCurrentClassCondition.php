<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\FilterCondition\MethodFilterCondition;

use BumbleDocGen\Parser\Entity\MethodEntity;
use BumbleDocGen\Parser\FilterCondition\ConditionInterface;

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
