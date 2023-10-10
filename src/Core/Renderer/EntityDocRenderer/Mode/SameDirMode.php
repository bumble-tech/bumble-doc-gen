<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer\EntityDocRenderer\Mode;

final class SameDirMode implements EntityRendererModeInterface
{
    public function prepareProject(): void
    {
    }

    public function getCustomParentDocPath(): ?string
    {
        return null;
    }
}
