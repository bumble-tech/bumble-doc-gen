<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\EntityDocRender\PhpClassToRst;

use BumbleDocGen\Parser\Entity\ClassEntity;
use BumbleDocGen\Render\Context\Context;
use BumbleDocGen\Render\Context\DocumentedEntityWrapper;
use BumbleDocGen\Render\EntityDocRender\EntityDocRenderInterface;
use BumbleDocGen\Render\Twig\MainExtension;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class PhpClassToRstDocRender implements EntityDocRenderInterface
{
    private Environment $twig;
    private ?Context $context = null;

    public function __construct()
    {
        $loader = new FilesystemLoader([
            __DIR__ . '/templates',
        ]);
        $this->twig = new Environment($loader);
    }

    public function isAvailableForEntity(DocumentedEntityWrapper $entityWrapper): bool
    {
        return is_subclass_of($entityWrapper->getDocumentTransformableEntity(), ClassEntity::class);
    }

    public function setContext(Context $context): void
    {
        $this->twig->addExtension(new MainExtension($context));
    }

    public function getRenderedText(DocumentedEntityWrapper $entityWrapper): string
    {
        $renderedBreadcrumbs = '';
        if ($this->context) {
            $renderedBreadcrumbs = $this->context->getBreadcrumbsHelper()->renderBreadcrumbs(
                $entityWrapper->getDocumentTransformableEntity()->getShortName(),
                $entityWrapper->getInitiatorFilePath()
            );
        }

        return $this->twig->render('class.rst.twig', [
            'classEntity' => $entityWrapper->getDocumentTransformableEntity(),
            'breadcrumbs' => $renderedBreadcrumbs,
        ]);
    }
}
