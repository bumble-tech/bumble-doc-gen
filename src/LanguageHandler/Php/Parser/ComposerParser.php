<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use Composer\Autoload\ClassLoader;

final class ComposerParser
{
    private array $packages = [];
    private ?ClassLoader $classLoader = null;

    public function __construct(private Configuration $configuration)
    {
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getComposerClassLoader(): ClassLoader
    {
        if ($this->classLoader) {
            return $this->classLoader;
        }

        $classLoader = new ClassLoader();
        $projectRoot = $this->configuration->getProjectRoot();
        $composerJsonPath = "{$projectRoot}/composer.json";
        if (!file_exists($composerJsonPath) || !is_readable($composerJsonPath)) {
            return $classLoader;
        }

        $composerConfig = json_decode(file_get_contents($composerJsonPath), true);

        $loadSection = function (array $section) use ($classLoader, $composerConfig, $projectRoot): void {
            if (isset($section['psr-4'])) {
                foreach ($section['psr-4'] as $namespace => $path) {
                    $classLoader->addPsr4($namespace, "{$projectRoot}/{$path}");
                }
            }
            if (isset($section['psr-0'])) {
                foreach ($section['psr-0'] as $namespace => $path) {
                    $classLoader->add($namespace, "{$projectRoot}/{$path}");
                }
            }
        };

        if (isset($composerConfig['autoload'])) {
            $loadSection($composerConfig['autoload']);
        }
        if (isset($composerConfig['autoload-dev'])) {
            $loadSection($composerConfig['autoload-dev']);
        }
        $this->classLoader = $classLoader;
        return $classLoader;
    }

    /**
     * @throws InvalidConfigurationParameterException
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

    public function getComposerPackageDataByClassName(string $className): ?array
    {
        if (!ParserHelper::isCorrectClassName($className)) {
            return null;
        }
        $packages = [];
        try {
            $packages = $this->getComposerPackages();
        } catch (\Exception) {
        }

        if ($packages) {
            $packages['Composer\\'] = [
                "path" => "src/Composer/",
                "namespace" => "Composer\\",
                "url" => "https://github.com/composer/composer"
            ];
        }
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
