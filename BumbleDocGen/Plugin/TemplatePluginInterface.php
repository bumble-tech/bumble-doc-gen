<?php

declare(strict_types=1);

namespace BumbleDocGen\Plugin;

use BumbleDocGen\Render\Context\Context;

/**
 * Plugin for working with page templates
 */
interface TemplatePluginInterface extends PluginInterface
{
    /**
     * Process rendered template content before writing to file
     *
     * @param string $content Rendered template content
     * @param Context $context Rendering context
     * @return string
     */
    public function handleRenderedTemplateContent(
        string $content,
        Context $context
    ): string;
}
