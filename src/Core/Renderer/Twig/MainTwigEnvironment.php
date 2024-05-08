<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer\Twig;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Plugin\Event\Renderer\OnGetProjectTemplatesDirs;
use BumbleDocGen\Core\Plugin\PluginEventDispatcher;
use BumbleDocGen\Core\Renderer\Breadcrumbs\BreadcrumbsHelper;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

final class MainTwigEnvironment
{
    public const TMP_TEMPLATE_PREFIX = '~bumbleDocGen';

    private Environment $twig;
    private bool $isEnvLoaded = false;
    private ?string $twigTemplatePrefixKey = null;
    private bool $prefixChanged = false;

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
            $this->twig = new Environment($loader, ['auto_reload' => true, 'cache' => false]);
            $this->twig->addExtension($this->mainExtension);
            $this->isEnvLoaded = true;
        }
    }

    /**
     * @internal
     */
    public function reloadTemplates(): void
    {
        $this->twigTemplatePrefixKey = uniqid();
        $this->prefixChanged = true;
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
        if ($this->twigTemplatePrefixKey && $this->prefixChanged) {
            $this->prefixChanged = false;
            $reflection = new \ReflectionClass($this->twig);
            $reflectionProperty = $reflection->getProperty('templateClassPrefix');
            $reflectionProperty->setValue($this->twig, "__TwigTemplate_" . md5($this->twigTemplatePrefixKey));
        }

        return $this->twig->render($name, $context);
    }
}
