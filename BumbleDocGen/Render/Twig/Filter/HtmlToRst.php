<?php

namespace BumbleDocGen\Render\Twig\Filter;

/**
 * Wraps an html string in an rst `..raw::html` construct, thus helping to display it.
 */
final class HtmlToRst
{
    /**
     * @param string $text Processed text
     */
    public function __invoke(string $text): string
    {
        static $addIndentFromLeftFunction;
        if (!$addIndentFromLeftFunction) {
            $addIndentFromLeftFunction = new AddIndentFromLeft();
        }
        if (!str_starts_with($text, '.. raw:: html')) {
            return ".. raw:: html\n\n {$addIndentFromLeftFunction($text, 1)}\n";
        }
        return $text;
    }
}
