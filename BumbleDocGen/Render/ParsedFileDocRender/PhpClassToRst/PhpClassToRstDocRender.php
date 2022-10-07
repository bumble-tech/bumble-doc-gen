<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\ParsedFileDocRender\PhpClassToRst;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Render\Context\Context;
use BumbleDocGen\Render\Context\DocumentedClass;
use BumbleDocGen\Render\ParsedFileDocRender\ParsedFileDocRenderInterface;
use BumbleDocGen\Render\Twig\MainExtension;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class PhpClassToRstDocRender implements ParsedFileDocRenderInterface
{
    private Environment $twig;

    public function __construct(ConfigurationInterface $configuration)
    {
        $loader = new FilesystemLoader([
            __DIR__ . '/templates',
            $configuration->getClassTemplatesDir()
        ]);
        $this->twig = new Environment($loader);
    }

    public function setContext(Context $context): void
    {
        $this->twig->addExtension(new MainExtension($context));
    }

    public function getRenderedText(DocumentedClass $documentedClass): string
    {
        return $this->twig->render('class.rst.twig', [
            'classEntity' => $documentedClass->getClassEntity(),
            'breadcrumbs' => $documentedClass->getBreadcrumbsData(),
        ]);
    }
}
