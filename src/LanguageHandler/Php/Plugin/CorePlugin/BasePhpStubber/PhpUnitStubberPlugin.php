<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\BasePhpStubber;

use BumbleDocGen\Core\Plugin\Event\Renderer\OnGettingResourceLink;
use BumbleDocGen\Core\Plugin\PluginInterface;
use BumbleDocGen\LanguageHandler\Php\Plugin\Event\Entity\OnCheckIsEntityCanBeLoad;

/**
 * Adding links to the documentation of PHP classes in the \PHPUnit namespace
 */
final class PhpUnitStubberPlugin implements PluginInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            OnGettingResourceLink::class => 'onGettingResourceLink',
            OnCheckIsEntityCanBeLoad::class => 'onCheckIsClassEntityCanBeLoad',
        ];
    }

    final public function onGettingResourceLink(OnGettingResourceLink $event): void
    {
        if (!$event->getResourceUrl()) {
            $resourceName = $event->getResourceName();
            if (!str_starts_with($resourceName, '\\')) {
                $resourceName = "\\{$resourceName}";
            }
            if (str_starts_with($resourceName, '\\PHPUnit\\')) {
                $resourceName = explode('::', $resourceName)[0];
                $resourceName = str_replace(['\\PHPUnit\\', '\\'], ['', '/'], $resourceName);
                $event->setResourceUrl("https://github.com/sebastianbergmann/phpunit/blob/master/src/{$resourceName}.php");
            }
        }
    }

    final public function onCheckIsClassEntityCanBeLoad(OnCheckIsEntityCanBeLoad $event): void
    {
        if (
            str_starts_with($event->getEntity()->getName(), 'PHPUnit\\') ||
            str_starts_with($event->getEntity()->getName(), '\\PHPUnit\\')
        ) {
            $event->disableClassLoading();
        }
    }
}
