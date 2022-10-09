<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig\Filter;

/**
 *
 */
final class TextToHeadingRst
{
    private array $templates = [
        'h1' => "================\n%text%\n================\n",
        'h2' => "%text%\n================\n",
        'h3' => "\n%text%\n-----------\n",
    ];

    public function __invoke(string $text, string $headingType): string
    {
        $template = $this->templates[strtolower($headingType)] ?? '%text%';
        return str_replace('%text%', $text, $template);
    }
}
