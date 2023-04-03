<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Render\EntityDocRender\PhpClassToMd;

use BumbleDocGen\Core\Parser\Entity\RootEntityInterface;
use BumbleDocGen\Core\Render\Context\Context;
use BumbleDocGen\Core\Render\Context\DocumentedEntityWrapper;
use BumbleDocGen\Core\Render\EntityDocRender\EntityDocRenderInterface;
use BumbleDocGen\Core\Render\Twig\MainExtension;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

/**
 * Rendering PHP classes into md format documents (for display on GitHub)
 */
class PhpClassToMdDocRender implements EntityDocRenderInterface
{
    public const BLOCK_AFTER_MAIN_INFO = 'after_main_info';
    public const BLOCK_AFTER_HEADER = 'after_header';
    public const BLOCK_BEFORE_DETAILS = 'before_details';

    private Environment $twig;

    public function __construct(private Context $context, MainExtension $mainExtension)
    {
        $loader = new FilesystemLoader([
            __DIR__ . '/templates',
        ]);
        $this->twig = new Environment($loader);
        $this->twig->addExtension($mainExtension);
    }

    public function getDocFileExtension(): string
    {
        return 'md';
    }

    public function getDocFileNamespace(): string
    {
        return 'classes';
    }

    public function isAvailableForEntity(RootEntityInterface $entity): bool
    {
        return is_a($entity, ClassEntity::class);
    }

    /**
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws LoaderError
     */
    public function getRenderedText(DocumentedEntityWrapper $entityWrapper): string
    {
        return $this->twig->render('class.md.twig', [
            'classEntity' => $entityWrapper->getDocumentTransformableEntity(),
            'generationInitiatorFilePath' => $entityWrapper->getInitiatorFilePath(),
            'renderContext' => $this->context,
        ]);
    }
}
