<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\FilterCondition;

interface ConditionInterface
{
    public function canAddToCollection(): bool;
}
