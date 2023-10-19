<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Plugin\Event\Renderer;

use Symfony\Contracts\EventDispatcher\Event;

/**
 * This event occurs when all directories containing document templates are retrieved
 */
final class OnGetProjectTemplatesDirs extends Event
{
    public function __construct(private array $templatesDirs)
    {
    }

    public function getTemplatesDirs(): array
    {
        return $this->templatesDirs;
    }

    public function addTemplatesDir(string $dirName): void
    {
        $this->templatesDirs[] = $dirName;
    }
}
