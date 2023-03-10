<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\FilterCondition\CommonFilterCondition;

use BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface;

/**
 * False conditions, any object is not available
 */
final class FalseCondition implements ConditionInterface
{
    public function canAddToCollection(): bool
    {
        return false;
    }
}
