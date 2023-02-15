<?php

declare(strict_types=1);

namespace BumbleDocGen\Plugin\CorePlugin\BasePhpStubber;

use BumbleDocGen\Plugin\Event\Entity\OnCheckIsClassEntityCanBeLoad;
use BumbleDocGen\Plugin\Event\Render\OnGettingResourceLink;
use BumbleDocGen\Plugin\PluginInterface;

final class ComposerStubberPlugin implements PluginInterface
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
            if (str_starts_with($resourceName, '\\Composer\\')) {
                $resourceName = str_replace(['\\Composer\\', '\\'], ['', '/'], $resourceName);
                $event->setResourceUrl("https://github.com/composer/composer/blob/master/src/Composer/{$resourceName}.php");
            }
        }
    }

    final public function onCheckIsClassEntityCanBeLoad(OnCheckIsClassEntityCanBeLoad $event): void
    {
        if (
            str_starts_with($event->getEntity()->getName(), 'Composer\\') ||
            str_starts_with($event->getEntity()->getName(), '\\Composer\\')
        ) {
            $event->disableClassLoading();
        }
    }
}
