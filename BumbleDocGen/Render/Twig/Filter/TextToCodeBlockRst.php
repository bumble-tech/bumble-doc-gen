<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig\Filter;

/**
 * Convert text to rst header
 */
final class TextToCodeBlockRst
{
    /**
     * @param string $text
     * @param string $codeBlockType
     * @return string
     */
    public function __invoke(string $text, string $codeBlockType): string
    {
        $addIndentFromLeftFunction = new AddIndentFromLeft();

        return ".. code-block:: {$codeBlockType}\n\n{$addIndentFromLeftFunction($text, 1)}\n";
    }
}
