<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig\Filter;

final class PrepareSourceLink
{
    public function __invoke(string $text): string
    {
        return mb_strtolower(str_replace(['__', '_'], '-', $text));
    }
}
