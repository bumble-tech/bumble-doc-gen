<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Renderer\EntityDocRenderer\PhpClassToMd;

use BumbleDocGen\Core\Parser\Entity\RootEntityInterface;
use BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrapper;
use BumbleDocGen\Core\Renderer\EntityDocRenderer\EntityDocRendererInterface;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

/**
 * Rendering PHP classes into md format documents (for display on GitHub)
 */
class PhpClassToMdDocRenderer implements EntityDocRendererInterface
{
    public const BLOCK_AFTER_MAIN_INFO = 'after_main_info';
    public const BLOCK_AFTER_HEADER = 'after_header';
    public const BLOCK_BEFORE_DETAILS = 'before_details';

    public function __construct(
        private PhpClassRendererTwigEnvironment $classRendererTwig
    ) {
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
        return $this->classRendererTwig->render('class.md.twig', [
            'classEntity' => $entityWrapper->getDocumentTransformableEntity(),
            'parentDocFilePath' => $entityWrapper->getParentDocFilePath()
        ]);
    }
}
