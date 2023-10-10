<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer\EntityDocRenderer\Mode;

interface EntityRendererModeInterface
{
    public function prepareProject(): void;

    public function getCustomParentDocPath(): ?string;
}
