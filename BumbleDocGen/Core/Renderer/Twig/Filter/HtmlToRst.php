<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer\Twig\Filter;

/**
 * Wraps a html string in a rst `..raw::html` construct, thus helping to display it.
 */
final class HtmlToRst implements CustomFilterInterface
{

    public function __construct(private AddIndentFromLeft $addIndentFromLeftFunction)
    {
    }

    /**
     * @param string $text Processed text
     */
    public function __invoke(string $text): string
    {
        if (!str_starts_with($text, '.. raw:: html')) {
            $addIndentFromLeftFunction = $this->addIndentFromLeftFunction;
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
