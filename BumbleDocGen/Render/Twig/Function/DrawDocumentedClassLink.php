<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig\Function;

use BumbleDocGen\Parser\Entity\ClassEntity;
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
    public const TEMPLATE_RST = 'rst';
    public const TEMPLATE_HTML = 'html';

    /**
     * @param Context $context Render context
     */
    public function __construct(private Context $context, private string $templateType = self::TEMPLATE_RST)
    {
    }

    public function __invoke(
        ClassEntity $classEntity,
        string $cursor = '',
        bool $useShortName = true
    ): string {
        $getDocumentedClassUrlFunction = new GetDocumentedClassUrl($this->context);
        $url = $getDocumentedClassUrlFunction($classEntity->getName(), $cursor);
        $name = $useShortName ? $classEntity->getShortName() : $classEntity->getName();

        return match ($this->templateType) {
            self::TEMPLATE_RST => "`{$name} <{$url}>`_",
            default => "<a href='{$url}'>{$name}</a>",
        };
    }
}
