<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Render\Twig\Filter;

/**
 * Convert text to code block
 */
final class TextToCodeBlock implements CustomFilterInterface
{
    public static function getName(): string
    {
        return 'textToCodeBlock';
    }

    public static function getOptions(): array
    {
        return [
            'is_safe' => ['html'],
        ];
    }

    /**
     * @param string $text Processed text
     * @param string $codeBlockType Code block type (e.g. php or console )
     * @return string
     */
    public function __invoke(string $text, string $codeBlockType): string
    {
        $addIndentFromLeftFunction = new AddIndentFromLeft();
        return "```{$codeBlockType}\n{$addIndentFromLeftFunction($text, 1)}\n```\n";
    }
}
