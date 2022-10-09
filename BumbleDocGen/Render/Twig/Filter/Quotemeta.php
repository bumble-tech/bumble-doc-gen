<?php

namespace BumbleDocGen\Render\Twig\Filter;

/**
 * Quote meta characters
 *
 * @see https://www.php.net/manual/en/function.quotemeta.php
 */
final class Quotemeta
{
    /**
     * @param string $text Processed text
     */
    public function __invoke(string $text): string
    {
        return quotemeta($text);
    }
}