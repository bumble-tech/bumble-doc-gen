<?php

declare(strict_types=1);

namespace BumbleDocGen\Plugin\CorePlugin\BasePhpStubber;

use BumbleDocGen\Plugin\Event\Render\OnGettingResourceLink;
use BumbleDocGen\Plugin\PluginInterface;

final class PsrClassesStubberPlugin implements PluginInterface
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
            if (str_starts_with($resourceName, '\\Psr\\Cache\\')) {
                $resourceName = str_replace(['\\Psr\\Cache\\', '\\'], ['', '/'], $resourceName);
                $event->setResourceUrl("https://github.com/php-fig/cache/blob/master/src/{$resourceName}.php");
            } elseif (str_starts_with($resourceName, '\\Psr\\Log\\')) {
                // $event->getContext()->getConfiguration()->getLogger()->error($resourceName);
                $resourceName = str_replace(['\\Psr\\Log\\', '\\'], ['', '/'], $resourceName);
                $event->setResourceUrl("https://github.com/php-fig/log/blob/master/src/{$resourceName}.php");
            } elseif (str_starts_with($resourceName, '\\Psr\\EventDispatcher\\')) {
                $resourceName = str_replace(['\\Psr\\EventDispatcher\\', '\\'], ['', '/'], $resourceName);
                $event->setResourceUrl("https://github.com/php-fig/event-dispatcher/blob/master/src/{$resourceName}.php");
            } elseif (str_starts_with($resourceName, '\\Psr\\Http\\Message\\')) {
                $resourceName = str_replace(['\\Psr\\Http\\Message\\', '\\'], ['', '/'], $resourceName);
                $event->setResourceUrl("https://github.com/php-fig/http-message/blob/master/src/{$resourceName}.php");
            } elseif (str_starts_with($resourceName, '\\Psr\\SimpleCache\\')) {
                $resourceName = str_replace(['\\Psr\\SimpleCache\\', '\\'], ['', '/'], $resourceName);
                $event->setResourceUrl("https://github.com/php-fig/simple-cache/blob/master/src/{$resourceName}.php");
            } elseif (str_starts_with($resourceName, '\\Psr\\Clock\\')) {
                $resourceName = str_replace(['\\Psr\\Clock\\', '\\'], ['', '/'], $resourceName);
                $event->setResourceUrl("https://github.com/php-fig/clock/blob/master/src/{$resourceName}.php");
            } elseif (str_starts_with($resourceName, '\\Psr\\Http\\Client\\')) {
                $resourceName = str_replace(['\\Psr\\Http\\Client\\', '\\'], ['', '/'], $resourceName);
                $event->setResourceUrl("https://github.com/php-fig/http-client/blob/master/src/{$resourceName}.php");
            } elseif (str_starts_with($resourceName, '\\Psr\\Http\\Server\\')) {
                $resourceName = str_replace(['\\Psr\\Http\\Server\\', '\\'], ['', '/'], $resourceName);
                $event->setResourceUrl("https://github.com/php-fig/http-server-middleware/blob/master/src/{$resourceName}.php");
            }
        }
    }
}
