<?php

namespace BumbleDocGen\Render\Twig\Filter;

interface CustomFilterInterface
{
    public static function getName(): string;

    public static function getOptions(): array;
}
