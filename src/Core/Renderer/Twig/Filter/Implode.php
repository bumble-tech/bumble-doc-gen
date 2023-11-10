<?php

namespace BumbleDocGen\Core\Renderer\Twig\Filter;

/**
 * @see https://www.php.net/manual/en/function.implode.php
 */
final class Implode implements CustomFilterInterface
{
    public function __invoke(array $elements, string $separator = ', '): string
    {
        return implode($separator, $elements);
    }

    public static function getName(): string
    {
        return 'implode';
    }

    public static function getOptions(): array
    {
        return [];
    }
}
