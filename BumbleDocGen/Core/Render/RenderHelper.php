<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Render;

use BumbleDocGen\Core\Plugin\Event\Render\OnGettingResourceLink;
use BumbleDocGen\Core\Plugin\PluginEventDispatcher;

final class RenderHelper
{
    public function __construct(private PluginEventDispatcher $pluginEventDispatcher)
    {
    }

    public function getPreloadResourceLink(string $resourceName): ?string
    {
        return $this->pluginEventDispatcher->dispatch(
            new OnGettingResourceLink($resourceName)
        )->getResourceUrl();
    }
}
