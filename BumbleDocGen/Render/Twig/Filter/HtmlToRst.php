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
        return ".. raw:: html\n\n <embed>{$addIndentFromLeftFunction($text, 1)}</embed>\n";
    }
}
