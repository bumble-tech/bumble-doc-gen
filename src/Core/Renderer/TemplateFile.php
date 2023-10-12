<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer;

final class TemplateFile
{
    public function __construct(private string $rearPath, private string $relativeDocPath)
    {
    }

    public function getRealPath(): string
    {
        return $this->rearPath;
    }

    public function getRelativeDocPath(): string
    {
        return $this->relativeDocPath;
    }
}
