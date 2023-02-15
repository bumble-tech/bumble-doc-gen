<?php

declare(strict_types=1);

namespace BumbleDocGen\Plugin\CorePlugin\BasePhpStubber;

use BumbleDocGen\Plugin\Event\Render\OnGettingResourceLink;
use BumbleDocGen\Plugin\PluginInterface;

final class TwigStubberPlugin implements PluginInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            OnGettingResourceLink::class => 'onGettingResourceLink',
        ];
    }

    final public function onGettingResourceLink(OnGettingResourceLink $event): void
    {
        if (!$event->getResourceUrl()) {
            $resourceName = $event->getResourceName();
            if (str_starts_with($resourceName, '\\Twig\\')) {
                $resourceName = str_replace(['\\Twig\\', '\\'], ['', '/'], $resourceName);
                $event->setResourceUrl("https://github.com/twigphp/Twig/blob/master/src/{$resourceName}.php");
            }
        }
    }
}
