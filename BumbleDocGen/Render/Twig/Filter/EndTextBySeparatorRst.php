<?php

namespace BumbleDocGen\Render\Twig\Filter;

/**
 * Terminates a string with a delimiter (only in rst format)
 */
final class EndTextBySeparatorRst
{
    /**
     * @param string $text Processed text
     */
    public function __invoke(string $text): string
    {
        return "{$text}\n---------\n";
    }
}
