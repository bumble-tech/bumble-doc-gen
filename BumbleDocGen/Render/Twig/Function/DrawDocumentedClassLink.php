<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig\Function;

use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassEntity;
use BumbleDocGen\Render\Context\Context;

/**
 * Creates an entity link by object
 *
 * @note This function initiates the creation of documents for the displayed classes
 *
 * @example {{ drawDocumentedClassLink($entity, 'getFunctions') }}
 * @example {{ drawDocumentedClassLink($entity) }}
 * @example {{ drawDocumentedClassLink($entity, '', false) }}
 */
final class DrawDocumentedClassLink
{
    /**
     * @param Context $context Render context
     */
    public function __construct(private Context $context)
    {
    }

    public function __invoke(
        ClassEntity $classEntity,
        string      $cursor = '',
        bool        $useShortName = true
    ): string
    {
        $getDocumentedEntityUrlFunction = new GetDocumentedEntityUrl($this->context);
        $url = $getDocumentedEntityUrlFunction($classEntity->getName(), $cursor);
        $name = $useShortName ? $classEntity->getShortName() : $classEntity->getName();
        if ($this->context->isCurrentTemplateRst()) {
            return "`{$name} <{$url}>`_";
        }
        return "<a href='{$url}'>{$name}</a>";
    }
}
