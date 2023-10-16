<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer\Twig;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Plugin\Event\Renderer\OnGetProjectTemplatesDirs;
use BumbleDocGen\Core\Plugin\PluginEventDispatcher;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

final class MainTwigEnvironment
{
    private Environment $twig;
    private bool $isEnvLoaded = false;

    public function __construct(
        private Configuration $configuration,
        private MainExtension $mainExtension,
        private PluginEventDispatcher $pluginEventDispatcher,
    ) {
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    private function loadMainTwigEnvironment(): void
    {
        if (!$this->isEnvLoaded) {
            $templatesDir = $this->configuration->getTemplatesDir();
            $event = $this->pluginEventDispatcher->dispatch(new OnGetProjectTemplatesDirs([$templatesDir]));
            $templatesDirs = $event->getTemplatesDirs();
            $loader = new FilesystemLoader($templatesDirs);
            $this->twig = new Environment($loader);
            $this->twig->addExtension($this->mainExtension);
            $this->isEnvLoaded = true;
        }
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     * @throws InvalidConfigurationParameterException
     */
    public function render($name, array $context = []): string
    {
        $this->loadMainTwigEnvironment();
        return $this->twig->render($name, $context);
    }
}
