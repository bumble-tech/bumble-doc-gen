<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\FilterCondition\ClassFilterCondition;

final class VisibilityConditionModifier
{
    public const NONE = 'none';
    public const PUBLIC = 'public';
    public const PROTECTED = 'protected';
    public const PRIVATE = 'private';
}
