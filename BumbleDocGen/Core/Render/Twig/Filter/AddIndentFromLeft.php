<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Render\Twig\Filter;

/**
 * Filter adds indent from left
 */
final class AddIndentFromLeft implements CustomFilterInterface
{
    /**
     * @param string $text Processed text
     * @param int $identLength Indent size
     * @param bool $skipFirstIdent Skip indent for first line in text or not
     * @return string
     */
    public function __invoke(string $text, int $identLength = 4, bool $skipFirstIdent = false): string
    {
        $indentText = str_repeat(' ', $identLength);
        return (!$skipFirstIdent ? $indentText : '') . implode("\n{$indentText}", explode("\n", $text));
    }

    public static function getName(): string
    {
        return 'addIndentFromLeft';
    }

    public static function getOptions(): array
    {
        return [
            'is_safe' => ['html'],
        ];
    }
}
