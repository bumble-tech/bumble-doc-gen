<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Render\Context;

use BumbleDocGen\Core\Plugin\PluginEventDispatcher;

/**
 * Document rendering context
 */
final class Context
{
    private string $currentTemplateFilePath = '';

    public function __construct(private PluginEventDispatcher $pluginEventDispatcher)
    {
    }

    /**
     * Saving the path to the template file that is currently being worked on in the context
     */
    public function setCurrentTemplateFilePatch(string $currentTemplateFilePath): void
    {
        $this->currentTemplateFilePath = $currentTemplateFilePath;
    }

    /**
     * Getting the path to the template file that is currently being worked on
     */
    public function getCurrentTemplateFilePatch(): string
    {
        return $this->currentTemplateFilePath;
    }

    public function isCurrentTemplateRst(): bool
    {
        return str_ends_with($this->getCurrentTemplateFilePatch(), '.rst.twig');
    }

    public function isCurrentTemplateMd(): bool
    {
        return str_ends_with($this->getCurrentTemplateFilePatch(), '.md.twig');
    }

    public function getPluginEventDispatcher(): PluginEventDispatcher
    {
        return $this->pluginEventDispatcher;
    }
}
