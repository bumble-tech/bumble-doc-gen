<?php

declare(strict_types=1);

namespace BumbleDocGen\Render;

use BumbleDocGen\Plugin\Event\Render\OnGettingResourceLink;
use BumbleDocGen\Render\Context\Context;

final class RenderHelper
{
    public static function getPreloadResourceLink(string $resourceName, Context $context): ?string
    {
        $pluginEventDispatcher = $context->getPluginEventDispatcher();
        return $pluginEventDispatcher->dispatch(
            new OnGettingResourceLink(
                $resourceName, $context
            )
        )->getResourceUrl();
    }
}
