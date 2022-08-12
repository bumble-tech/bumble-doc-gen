<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig\Filter;

final class AddIndentFromLeft
{
    public function __invoke(string $text, int $identLength = 4, bool $skipFirstIdent = false): string
    {
        $indentText = str_repeat(' ', $identLength);
        return (!$skipFirstIdent ? $indentText : '') . implode("\n{$indentText}", explode("\n", $text));
    }
}
