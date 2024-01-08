<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer\Twig;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Plugin\Event\Renderer\OnGetProjectTemplatesDirs;
use BumbleDocGen\Core\Plugin\PluginEventDispatcher;
use BumbleDocGen\Core\Renderer\Breadcrumbs\BreadcrumbsHelper;
use BumbleDocGen\Core\Renderer\TemplateFile;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

final class MainTwigEnvironment
{
    private Environment $twig;
    private bool $isEnvLoaded = false;
    private bool $dynamicTemplatesMode = false;

    public function __construct(
        private readonly Configuration $configuration,
        private readonly MainExtension $mainExtension,
        private readonly PluginEventDispatcher $pluginEventDispatcher,
        private readonly BreadcrumbsHelper $breadcrumbsHelper
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
            $removeFrontMatterFromTemplate = !$this->configuration->renderWithFrontMatter();
            $loader = new FrontMatterLoader(
                new FilesystemLoader($templatesDirs),
                $this->breadcrumbsHelper,
                $removeFrontMatterFromTemplate
            );
            $this->twig = new Environment($loader);
            $this->twig->addExtension($this->mainExtension);
            $this->isEnvLoaded = true;
        }
    }

    /**
     * To avoid template caching in Twig
     *
     * @internal
     */
    public function enableDynamicTemplatesMode(): void
    {
        $this->dynamicTemplatesMode = true;
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
        // To avoid template caching in Twig
        if ($this->dynamicTemplatesMode) {
            $tmpTemplate = '/~bumbleDocGen' . uniqid() . '.twig';
            $tmpFile = $this->configuration->getTemplatesDir() . $tmpTemplate;
            try {
                $path = TemplateFile::getTemplatePathByRelativeDocPath($name, $this->configuration, $this->pluginEventDispatcher);
                file_put_contents($tmpFile, file_get_contents($path));
                $data = $this->twig->render($tmpTemplate, $context);
            } finally {
                unlink($tmpFile);
            }
            return $data;
        }

        return $this->twig->render($name, $context);
    }
}
