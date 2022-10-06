<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig\Filter;

/**
 * The filter converts the string into an anchor that can be used in a github document link
 */
final class PrepareSourceLink
{
    public function __invoke(string $text): string
    {
        return mb_strtolower(str_replace(['__', '_'], '-', $text));
    }
}
