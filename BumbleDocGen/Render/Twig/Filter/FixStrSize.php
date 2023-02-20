<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig\Filter;

/**
 * The filter pads the string with the specified characters on the right to the specified size
 */
final class FixStrSize implements CustomFilterInterface
{
    /**
     * @param string $text Processed text
     * @param int $size Required string size
     * @param string $symbol The character to be used to complete the string
     * @return string
     */
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

    public static function getName(): string
    {
        return 'fixStrSize';
    }

    public static function getOptions(): array
    {
        return [
            'is_safe' => ['html'],
        ];
    }
}
