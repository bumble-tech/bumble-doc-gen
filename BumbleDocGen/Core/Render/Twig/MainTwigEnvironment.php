<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Render\Twig;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

final class MainTwigEnvironment
{
    private Environment $twig;

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function __construct(
        Configuration $configuration,
        MainExtension $mainExtension
    )
    {
        $templateFolder = $configuration->getTemplatesDir();
        $loader = new FilesystemLoader([$templateFolder]);
        $this->twig = new Environment($loader);
        $this->twig->addExtension($mainExtension);
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function render($name, array $context = []): string
    {
        return $this->twig->render($name, $context);
    }
}
