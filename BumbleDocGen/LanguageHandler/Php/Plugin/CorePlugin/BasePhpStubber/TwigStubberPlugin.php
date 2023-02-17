<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\BasePhpStubber;

use BumbleDocGen\LanguageHandler\Php\Plugin\Event\Entity\OnCheckIsClassEntityCanBeLoad;
use BumbleDocGen\Plugin\Event\Render\OnGettingResourceLink;
use BumbleDocGen\Plugin\PluginInterface;

final class TwigStubberPlugin implements PluginInterface
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
            if (str_starts_with($resourceName, '\\Twig\\')) {
                $resourceName = str_replace(['\\Twig\\', '\\'], ['', '/'], $resourceName);
                $event->setResourceUrl("https://github.com/twigphp/Twig/blob/master/src/{$resourceName}.php");
            }
        }
    }

    final public function onCheckIsClassEntityCanBeLoad(OnCheckIsClassEntityCanBeLoad $event): void
    {
        if (
            str_starts_with($event->getEntity()->getName(), 'Twig\\') ||
            str_starts_with($event->getEntity()->getName(), '\\Twig\\')
        ) {
            $event->disableClassLoading();
        }
    }
}
