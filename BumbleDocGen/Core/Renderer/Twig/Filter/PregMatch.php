<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer\Twig\Filter;

/**
 * Perform a regular expression match
 *
 * @see https://www.php.net/manual/en/function.preg-match.php
 */
final class PregMatch implements CustomFilterInterface
{
    /**
     * @param string $text Processed text
     * @param string $pattern The pattern to search for, as a string.
     *
     * @return array matches, is filled with the results of search.
     */
    public function __invoke(string $text, string $pattern): array
    {
        preg_match($pattern, $text, $matches);
        return $matches;
    }

    public static function getName(): string
    {
        return 'preg_match';
    }

    public static function getOptions(): array
    {
        return [
            'is_safe' => ['html'],
        ];
    }
}