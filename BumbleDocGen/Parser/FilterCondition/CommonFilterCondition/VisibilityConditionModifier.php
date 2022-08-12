<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\FilterCondition\CommonFilterCondition;

enum VisibilityConditionModifier
{
    case NONE;
    case PUBLIC;
    case PROTECTED;
    case PRIVATE;
}
