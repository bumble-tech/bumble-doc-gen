<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Plugin\CorePlugin\ComposerPackagesStubber;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Plugin\Event\Renderer\OnGettingResourceLink;
use BumbleDocGen\Core\Plugin\PluginInterface;
use BumbleDocGen\LanguageHandler\Php\Plugin\Event\Entity\OnCheckIsClassEntityCanBeLoad;

final class StubberPlugin implements PluginInterface
{
    private array $packages = [];
    private array $foundLinks = [];

    public function __construct(private Configuration $configuration)
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

            if (!isset($this->foundLinks[$resourceName])) {
                $packageData = $this->getPackageDataByName($resourceName);
                if (!$packageData) {
                    return;
                }
                $resourceName = str_replace(
                    [$packageData['namespace'], '\\'],
                    ['', '/'],
                    $resourceName
                );
                $url = "/blob/master/{$packageData['path']}{$resourceName}.php";
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
        if ($this->getPackageDataByName($event->getEntity()->getName())) {
            $event->disableClassLoading();
        }
    }

    /**
     * @throws \Exception
     */
    private function getComposerPackages(): array
    {
        if ($this->packages) {
            return $this->packages;
        }
        $installedJsonFile = realpath($this->configuration->getProjectRoot() . '/vendor/composer/installed.json');
        $installedPackagesData = json_decode(file_get_contents($installedJsonFile), true);
        foreach ($installedPackagesData['packages'] as $package) {
            if (!isset($package['source']['url']) || !str_contains($package['source']['url'], 'https://github.com/')) {
                continue;
            }
            $psr4 = $package['autoload']["psr-4"] ?? [];
            foreach ($psr4 as $namespace => $path) {
                $this->packages[$namespace] = [
                    'path' => $path,
                    'namespace' => $namespace,
                    'url' => str_replace('.git', '', $package['source']['url'])
                ];
            }
        }
        return $this->packages;
    }

    /**
     * @throws \Exception
     */
    private function getPackageDataByName(string $className): ?array
    {
        $packages = $this->getComposerPackages();
        $classParts = explode('\\', $className);
        $namespace = '';
        foreach ($classParts as $part) {
            if ($part) {
                $namespace .= "{$part}\\";
                if (isset($packages[$namespace])) {
                    return $packages[$namespace];
                }
            }
        }
        return null;
    }
}
