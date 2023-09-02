<?php

namespace BumbleDocGen\Core\Renderer\Twig\Function;

interface CustomFunctionInterface
{
    public static function getName(): string;

    public static function getOptions(): array;
}
