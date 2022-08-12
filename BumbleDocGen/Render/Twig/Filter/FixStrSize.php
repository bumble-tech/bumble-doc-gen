<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig\Filter;

final class FixStrSize
{
    public function __invoke(string $text, int $size, string $symbol = ' '): string
    {
        $strLen = mb_strlen($text);
        if ($strLen < $size) {
            for ($i = $size - $strLen; $i > 0; $i--) {
                $text .= $symbol;
            }
        }
        return $text;
    }
}
