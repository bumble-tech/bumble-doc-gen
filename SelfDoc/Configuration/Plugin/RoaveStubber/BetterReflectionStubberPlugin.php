<?php

declare(strict_types=1);

namespace SelfDoc\Configuration\Plugin\RoaveStubber;

use BumbleDocGen\LanguageHandler\Php\Plugin\Event\Entity\OnCheckIsClassEntityCanBeLoad;
use BumbleDocGen\Plugin\Event\Render\OnGettingResourceLink;
use BumbleDocGen\Plugin\PluginInterface;

final class BetterReflectionStubberPlugin implements PluginInterface
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
            if (str_starts_with($resourceName, '\\Roave\\BetterReflection\\')) {
                $resourceName = str_replace(['\\Roave\\BetterReflection\\', '\\'], ['', '/'], $resourceName);
                $event->setResourceUrl("https://github.com/Roave/BetterReflection/blob/master/src/{$resourceName}.php");
            }
        }
    }

    final public function onCheckIsClassEntityCanBeLoad(OnCheckIsClassEntityCanBeLoad $event): void
    {
        if (
            str_starts_with($event->getEntity()->getName(), 'Roave\\BetterReflection\\') ||
            str_starts_with($event->getEntity()->getName(), '\\Roave\\BetterReflection\\')
        ) {
            $event->disableClassLoading();
        }
    }
}
