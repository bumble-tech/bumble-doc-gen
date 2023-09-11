<?php

namespace BumbleDocGen\Core\Renderer\Twig\Filter;

interface CustomFilterInterface
{
    public static function getName(): string;

    public static function getOptions(): array;
}
