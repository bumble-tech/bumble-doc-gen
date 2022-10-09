<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig\Filter;

/**
 * Convert text to rst header
 */
final class TextToCodeBlockRst
{
    /**
     * @param string $text Processed text
     * @param string $codeBlockType Code block type (e.g. php or console )
     * @return string
     */
    public function __invoke(string $text, string $codeBlockType): string
    {
        $addIndentFromLeftFunction = new AddIndentFromLeft();

        return ".. code-block:: {$codeBlockType}\n\n{$addIndentFromLeftFunction($text, 1)}\n";
    }
}
