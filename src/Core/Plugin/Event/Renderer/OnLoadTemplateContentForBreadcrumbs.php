<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Plugin\Event\Renderer;

use Symfony\Contracts\EventDispatcher\Event;

final class OnLoadTemplateContentForBreadcrumbs extends Event
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
