<?php

namespace BumbleDocGen\Render\Twig\Function;

interface CustomFunctionInterface
{
    public static function getName(): string;

    public static function getOptions(): array;
}
