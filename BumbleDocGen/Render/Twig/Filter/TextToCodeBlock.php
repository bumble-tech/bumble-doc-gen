<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig\Filter;

use BumbleDocGen\Render\Context\Context;

/**
 * Convert text to code block
 */
final class TextToCodeBlock implements CustomFilterInterface
{

    public function __construct(private Context $context)
    {
    }

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

        if ($this->context->isCurrentTemplateRst()) {
            return ".. code-block:: {$codeBlockType}\n\n{$addIndentFromLeftFunction($text, 1)}\n";
        } elseif ($this->context->isCurrentTemplateMd()) {
            return "```{$codeBlockType}\n{$addIndentFromLeftFunction($text, 1)}\n```\n";
        }
        return "<code>{$addIndentFromLeftFunction($text, 1)}</code>";
    }
}
