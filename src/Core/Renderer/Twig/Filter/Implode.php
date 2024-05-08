<?php

namespace BumbleDocGen\Core\Renderer\Twig\Filter;

/**
 * Join array elements with a string
 *
 * @see https://www.php.net/manual/en/function.implode.php
 */
final class Implode implements CustomFilterInterface
{
    /**
     * @param array $elements The array to implode
     * @param string $separator Element separator in result string
     * @return string $result
     */
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
