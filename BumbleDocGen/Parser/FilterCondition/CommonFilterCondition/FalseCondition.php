<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\FilterCondition\CommonFilterCondition;

use BumbleDocGen\Parser\FilterCondition\ConditionInterface;

final class FalseCondition implements ConditionInterface
{
    public function canAddToCollection(): bool
    {
        return false;
    }
}
