<?php

declare(strict_types=1);

namespace BumbleDocGen\Plugin;

use BumbleDocGen\Render\Context\Context;

interface TemplatePluginInterface extends PluginInterface
{
    public function handleRenderedTemplateContent(
        string $content,
        Context $context
    ): string;
}
