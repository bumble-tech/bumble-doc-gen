<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\FilterCondition\CommonFilterCondition;

use BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface;

/**
 * True conditions, any object is available
 */
final class TrueCondition implements ConditionInterface
{
    public function canAddToCollection(): bool
    {
        return true;
    }
}
