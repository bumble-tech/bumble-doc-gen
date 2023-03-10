<?php

namespace BumbleDocGen\Core\Render\Twig\Function;

interface CustomFunctionInterface
{
    public static function getName(): string;

    public static function getOptions(): array;
}
