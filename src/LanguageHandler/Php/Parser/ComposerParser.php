<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser;

use BumbleDocGen\Core\Configuration\Configuration;

final class ComposerParser
{
    private array $packages = [];
    public function __construct(private Configuration $configuration)
    {
    }

    /**
     * @throws \Exception
     */
    public function getComposerPackages(): array
    {
        if ($this->packages) {
            return $this->packages;
        }
        $installedJsonFile = realpath($this->configuration->getProjectRoot() . '/vendor/composer/installed.json');
        $installedPackagesData = json_decode(file_get_contents($installedJsonFile), true);
        foreach ($installedPackagesData['packages'] as $package) {
            if (!isset($package['source']['url'])) {
                continue;
            }

            if (str_starts_with($package['source']['url'], 'https://github.com/')) {
                $url = str_replace('.git', '', $package['source']['url']);
            } elseif (str_starts_with($package['source']['url'], 'git@github')) {
                preg_match('/(@)(.*?)(:)(.*?)(.git)/', $package['source']['url'], $matches);
                $url = "https://{$matches[2]}/{$matches[4]}";
            } else {
                continue;
            }

            $psr4 = $package['autoload']["psr-4"] ?? [];
            foreach ($psr4 as $namespace => $path) {
                $this->packages[$namespace] = [
                    'path' => $path,
                    'namespace' => $namespace,
                    'url' => $url
                ];
            }
        }
        return $this->packages;
    }

    /**
     * @throws \Exception
     */
    public function getComposerPackageDataByClassName(string $className): ?array
    {
        if (!ParserHelper::isCorrectClassName($className)) {
            return null;
        }
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
