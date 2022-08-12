<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig\Filter;

final class RemoveLineBrakes
{
    public function __invoke(string $text): string
    {
        return str_replace(PHP_EOL, ' ', $text);;
    }
}
