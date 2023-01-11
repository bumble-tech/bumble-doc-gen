<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig\Filter;

use BumbleDocGen\Render\Context\Context;

/**
 * Convert text to html or rst header
 */
final class TextToHeading
{
    private array $templates = [
        'h1' => "<h1>%text%</h1>",
        'h2' => "<h2>%text%</h2>",
        'h3' => "<h3>%text%</h3>",
    ];

    public function __construct(private Context $context)
    {
    }

    /**
     * @param string $text
     * @param string $headingType Choose heading type: H1, H2, H3
     * @return string
     */
    public function __invoke(string $text, string $headingType): string
    {
        $template = $this->templates[strtolower($headingType)] ?? '%text%';
        $content = str_replace('%text%', $text, $template);
        if (str_contains($this->context->getCurrentTemplateFilePatch(), 'rst')) {
            $htmlToRstFunction = new HtmlToRst();
            return $htmlToRstFunction($content);
        }
        return $content;
    }
}
