<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\EntityDocRender\PhpClassToRst;

use BumbleDocGen\Parser\Entity\ClassEntity;
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

    public function isAvailableForDocumentedEntity(DocumentedEntity $documentedClass): bool
    {
        return is_subclass_of($documentedClass->getDocumentTransformableEntity(), ClassEntity::class);
    }

    public function setContext(Context $context): void
    {
        $this->twig->addExtension(new MainExtension($context));
    }

    public function getRenderedText(DocumentedEntity $documentedEntity): string
    {
        return $this->twig->render('class.rst.twig', [
            'classEntity' => $documentedEntity->getDocumentTransformableEntity(),
            'breadcrumbs' => $documentedEntity->renderBreadcrumbs(),
        ]);
    }
}
