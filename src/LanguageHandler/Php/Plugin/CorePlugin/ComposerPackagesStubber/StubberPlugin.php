<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\ComposerPackagesStubber;

use BumbleDocGen\Core\Plugin\Event\Renderer\OnGettingResourceLink;
use BumbleDocGen\Core\Plugin\PluginInterface;
use BumbleDocGen\LanguageHandler\Php\Parser\ComposerHelper;
use BumbleDocGen\LanguageHandler\Php\Plugin\Event\Entity\OnCheckIsClassEntityCanBeLoad;

/**
 * The plugin allows you to automatically provide links to github repositories for documented classes from libraries included in composer
 */
final class StubberPlugin implements PluginInterface
{
    private array $foundLinks = [];

    public function __construct(private ComposerHelper $composerHelper)
    {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            OnGettingResourceLink::class => 'onGettingResourceLink',
            OnCheckIsClassEntityCanBeLoad::class => 'onCheckIsClassEntityCanBeLoad',
        ];
    }

    /**
     * @throws \Exception
     */
    final public function onGettingResourceLink(OnGettingResourceLink $event): void
    {
        if (!$event->getResourceUrl()) {
            $resourceName = trim($event->getResourceName());
            $resourceName = explode('::', $resourceName)[0];
            if (!isset($this->foundLinks[$resourceName])) {
                $packageData = $this->composerHelper->getComposerPackageDataByClassName($resourceName);
                if (!$packageData) {
                    return;
                }
                $resourceName = ltrim(str_replace(
                    [$packageData['namespace'], '\\'],
                    ['', '/'],
                    $resourceName
                ), '/');
                $url = "/blob/master/{$packageData['path']}/{$resourceName}.php";
                $this->foundLinks[$resourceName] = $packageData['url'] . str_replace('//', '/', $url);
            }

            $event->setResourceUrl($this->foundLinks[$resourceName]);
        }
    }

    /**
     * @throws \Exception
     */
    final public function onCheckIsClassEntityCanBeLoad(OnCheckIsClassEntityCanBeLoad $event): void
    {
        if ($this->composerHelper->getComposerPackageDataByClassName($event->getEntity()->getName())) {
            $event->disableClassLoading();
        }
    }
}
