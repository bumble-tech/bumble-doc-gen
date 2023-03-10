<?php

namespace BumbleDocGen\Core\Render\Twig\Filter;

/**
 * Quote meta characters
 *
 * @see https://www.php.net/manual/en/function.quotemeta.php
 */
final class Quotemeta implements CustomFilterInterface
{
    /**
     * @param string $text Processed text
     */
    public function __invoke(string $text): string
    {
        return quotemeta($text);
    }

    public static function getName(): string
    {
        return 'quotemeta';
    }

    public static function getOptions(): array
    {
        return [
            'is_safe' => ['html'],
        ];
    }
}