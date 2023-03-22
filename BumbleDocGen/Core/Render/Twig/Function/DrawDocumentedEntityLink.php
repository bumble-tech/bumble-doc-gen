<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Render\Twig\Function;

use BumbleDocGen\Core\Parser\Entity\RootEntityInterface;
use BumbleDocGen\Core\Render\Context\Context;

/**
 * Creates an entity link by object
 *
 * @note This function initiates the creation of documents for the displayed entities
 *
 * @example {{ drawDocumentedEntityLink($entity, 'getFunctions()') }}
 * @example {{ drawDocumentedEntityLink($entity) }}
 * @example {{ drawDocumentedEntityLink($entity, '', false) }}
 */
final class DrawDocumentedEntityLink implements CustomFunctionInterface
{
    /**
     * @param Context $context Render context
     */
    public function __construct(private Context $context)
    {
    }

    public static function getName(): string
    {
        return 'drawDocumentedEntityLink';
    }

    public static function getOptions(): array
    {
        return [
            'is_safe' => ['html'],
        ];
    }

    public function __invoke(
        RootEntityInterface $entity,
        string              $cursor = '',
        bool                $useShortName = true
    ): string
    {
        $getDocumentedEntityUrlFunction = new GetDocumentedEntityUrl($this->context);
        $url = $getDocumentedEntityUrlFunction($entity->getRootEntityCollection(), $entity->getName(), $cursor);
        $name = $useShortName ? $entity->getShortName() : $entity->getName();
        if ($this->context->isCurrentTemplateRst()) {
            return "`{$name} <{$url}>`_";
        }
        return "<a href='{$url}'>{$name}</a>";
    }
}
