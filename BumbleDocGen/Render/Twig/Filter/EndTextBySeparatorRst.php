<?php

namespace BumbleDocGen\Render\Twig\Filter;

/**
 *
 */
final class EndTextBySeparatorRst
{
    public function __invoke(string $text): string
    {
        return "{$text}\n---------\n";
    }
}
