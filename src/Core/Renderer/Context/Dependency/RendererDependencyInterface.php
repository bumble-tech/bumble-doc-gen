<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer\Context\Dependency;

use BumbleDocGen\Core\Renderer\RendererHelper;

interface RendererDependencyInterface
{
    public function isChanged(RendererHelper $rendererHelper): bool;
}
