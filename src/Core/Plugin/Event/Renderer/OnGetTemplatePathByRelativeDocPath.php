<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Plugin\Event\Renderer;

use Symfony\Contracts\EventDispatcher\Event;

/**
 * The event occurs when the path to the template file is obtained relative to the path to the document
 */
final class OnGetTemplatePathByRelativeDocPath extends Event
{
    private ?string $customTemplateFilePath = null;

    public function __construct(private string $templateName)
    {
    }

    public function getTemplateName(): string
    {
        return $this->templateName;
    }

    public function setCustomTemplateFilePath(?string $customTemplateFilePath): void
    {
        $this->customTemplateFilePath = $customTemplateFilePath;
    }

    public function getCustomTemplateFilePath(): ?string
    {
        return $this->customTemplateFilePath;
    }
}
