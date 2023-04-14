<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Render\EntityDocRender\PhpClassToMd;

use BumbleDocGen\Core\Parser\Entity\RootEntityInterface;
use BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrapper;
use BumbleDocGen\Core\Renderer\EntityDocRender\EntityDocRenderInterface;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

/**
 * Rendering PHP classes into md format documents (for display on GitHub)
 */
class PhpClassToMdDocRender implements EntityDocRenderInterface
{
    public const BLOCK_AFTER_MAIN_INFO = 'after_main_info';
    public const BLOCK_AFTER_HEADER = 'after_header';
    public const BLOCK_BEFORE_DETAILS = 'before_details';

    public function __construct(
        private PhpClassRenderTwigEnvironment $classRenderTwig
    )
    {
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
        return $this->classRenderTwig->render('class.md.twig', [
            'classEntity' => $entityWrapper->getDocumentTransformableEntity(),
            'generationInitiatorFilePath' => $entityWrapper->getInitiatorFilePath()
        ]);
    }
}
