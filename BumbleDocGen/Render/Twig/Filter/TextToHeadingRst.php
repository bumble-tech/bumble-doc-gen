<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig\Filter;

/**
 * Convert text to rst header
 */
final class TextToHeadingRst
{
    private array $templates = [
        'h1' => "================\n%text%\n================\n",
        'h2' => "%text%\n================\n",
        'h3' => "\n%text%\n-----------\n",
    ];

    /**
     * @param string $text
     * @param string $headingType Choose heading type: H1, H2, H3
     * @return string
     */
    public function __invoke(string $text, string $headingType): string
    {
        $template = $this->templates[strtolower($headingType)] ?? '%text%';
        return str_replace('%text%', $text, $template);
    }
}
