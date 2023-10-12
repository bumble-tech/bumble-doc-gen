<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Plugin\Event\Renderer;

use Symfony\Contracts\EventDispatcher\Event;

final class BeforeLoadAllPagesLinks extends Event
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
