<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\BasePhpStubber;

use BumbleDocGen\Core\Plugin\Event\Renderer\OnGettingResourceLink;
use BumbleDocGen\Core\Plugin\PluginInterface;
use BumbleDocGen\LanguageHandler\Php\Plugin\Event\Entity\OnCheckIsClassEntityCanBeLoad;

/**
 * Adding links to the documentation of PHP classes in the \Psr namespace
 */
final class PsrClassesStubberPlugin implements PluginInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            OnGettingResourceLink::class => 'onGettingResourceLink',
            OnCheckIsClassEntityCanBeLoad::class => 'onCheckIsClassEntityCanBeLoad',
        ];
    }

    final public function onGettingResourceLink(OnGettingResourceLink $event): void
    {
        if (!$event->getResourceUrl()) {
            $resourceName = $event->getResourceName();
            if (!str_starts_with($resourceName, '\\')) {
                $resourceName = "\\{$resourceName}";
            }
            if (str_starts_with($resourceName, '\\Psr\\Cache\\')) {
                $resourceName = str_replace(['\\Psr\\Cache\\', '\\'], ['', '/'], $resourceName);
                $event->setResourceUrl("https://github.com/php-fig/cache/blob/master/src/{$resourceName}.php");
            } elseif (str_starts_with($resourceName, '\\Psr\\Log\\')) {
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

    final public function onCheckIsClassEntityCanBeLoad(OnCheckIsClassEntityCanBeLoad $event): void
    {
        if (
            str_starts_with($event->getEntity()->getName(), 'Psr\\') ||
            str_starts_with($event->getEntity()->getName(), '\\Psr\\')
        ) {
            $event->disableClassLoading();
        }
    }
}
