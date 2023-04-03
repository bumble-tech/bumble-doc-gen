<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Render\Context;

/**
 * Document rendering context
 */
final class Context
{
    private string $currentTemplateFilePath = '';

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
}
