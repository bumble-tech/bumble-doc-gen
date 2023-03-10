<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Render;

use BumbleDocGen\Core\Plugin\Event\Render\OnGettingResourceLink;
use BumbleDocGen\Core\Render\Context\Context;

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
