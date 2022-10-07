<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\EntityDocRender\PhpClassToRst;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Render\Context\Context;
use BumbleDocGen\Render\Context\DocumentedEntity;
use BumbleDocGen\Render\EntityDocRender\EntityDocRenderInterface;
use BumbleDocGen\Render\Twig\MainExtension;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class PhpClassToRstDocRender implements EntityDocRenderInterface
{
    private Environment $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader([
            __DIR__ . '/templates',
        ]);
        $this->twig = new Environment($loader);
    }

    public function setContext(Context $context): void
    {
        $this->twig->addExtension(new MainExtension($context));
    }

    public function getRenderedText(DocumentedEntity $documentedEntity): string
    {
        return $this->twig->render('class.rst.twig', [
            'classEntity' => $documentedEntity->getClassEntity(),
            'breadcrumbs' => $documentedEntity->renderBreadcrumbs(),
        ]);
    }
}
