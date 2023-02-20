<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig\Filter;

/**
 * The filter replaces all line breaks with a space
 */
final class RemoveLineBrakes implements CustomFilterInterface
{
    /**
     * @param string $text Processed text
     */
    public function __invoke(string $text): string
    {
        return str_replace(PHP_EOL, ' ', $text);
    }

    public static function getName(): string
    {
        return 'removeLineBrakes';
    }

    public static function getOptions(): array
    {
        return [];
    }
}
