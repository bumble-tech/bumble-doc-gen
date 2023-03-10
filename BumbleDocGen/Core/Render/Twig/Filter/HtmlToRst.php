<?php

namespace BumbleDocGen\Core\Render\Twig\Filter;

/**
 * Wraps an html string in an rst `..raw::html` construct, thus helping to display it.
 */
final class HtmlToRst implements CustomFilterInterface
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

    public static function getName(): string
    {
        return 'htmlToRst';
    }

    public static function getOptions(): array
    {
        return [
            'is_safe' => ['html'],
        ];
    }
}
