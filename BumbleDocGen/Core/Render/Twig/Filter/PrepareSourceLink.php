<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Render\Twig\Filter;

use function \mb_strtolower;

/**
 * The filter converts the string into an anchor that can be used in a GitHub document link
 */
final class PrepareSourceLink implements CustomFilterInterface
{
    /**
     * @param string $text Processed text
     */
    public function __invoke(string $text): string
    {
        return mb_strtolower(str_replace(['__', '_'], '-', $text));
    }

    public static function getName(): string
    {
        return 'prepareSourceLink';
    }

    public static function getOptions(): array
    {
        return [];
    }
}
