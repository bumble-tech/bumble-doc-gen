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

/**
 * Rendering PHP classes into rst format documents (for display on github)
 */
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

    public function isAvailableForEntity(DocumentedEntityWrapper $entityWrapper): bool
    {
        return is_a($entityWrapper->getDocumentTransformableEntity(), ClassEntity::class);
    }

    public function setContext(Context $context): void
    {
        static $mainExtension;
        if (!$mainExtension) {
            $mainExtension = new MainExtension($context);
            $this->twig->addExtension($mainExtension);
        } else {
            $mainExtension->changeContext($context);
        }
    }

    public function getRenderedText(DocumentedEntityWrapper $entityWrapper): string
    {
        return $this->twig->render('class.rst.twig', [
            'classEntity' => $entityWrapper->getDocumentTransformableEntity(),
            'generationInitiatorFilePath' => $entityWrapper->getInitiatorFilePath(),
        ]);
    }
}
