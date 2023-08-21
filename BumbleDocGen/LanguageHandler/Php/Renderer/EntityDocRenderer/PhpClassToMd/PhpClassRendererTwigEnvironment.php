<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Renderer\EntityDocRenderer\PhpClassToMd;

use BumbleDocGen\Core\Renderer\Twig\MainExtension;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

final class PhpClassRendererTwigEnvironment
{
    private Environment $twig;

    public function __construct(MainExtension $mainExtension)
    {
        $loader = new FilesystemLoader([
            __DIR__ . '/templates',
        ]);
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
