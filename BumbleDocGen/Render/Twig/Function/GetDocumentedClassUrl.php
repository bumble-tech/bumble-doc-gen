<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig\Function;

use BumbleDocGen\Render\Context\Context;
use BumbleDocGen\Render\Context\DocumentedEntityWrapper;
use BumbleDocGen\Render\Context\DocumentedEntityWrappersCollection;
use BumbleDocGen\Render\Context\DocumentTransformableEntityInterface;
use BumbleDocGen\Render\RenderHelper;

/**
 * Get the URL of a documented class by its name. If the class is found, next to the file where this method was called,
 * the `classes` directory will be created, in which the documented class file will be created
 *
 * @note This function initiates the creation of documents for the displayed classes
 * @see DocumentedEntityWrapper
 * @see DocumentedEntityWrappersCollection
 * @see Context::$entityWrappersCollection
 *
 * @example {{ getDocumentedClassUrl('\\BumbleDocGen\\Render\\Twig\\MainExtension', 'getFunctions') }}
 * @example {{ getDocumentedClassUrl('\\BumbleDocGen\\Render\\Twig\\MainExtension') }}
 * @example {{ getDocumentedClassUrl('\\BumbleDocGen\\Render\\Twig\\MainExtension', '', false) }}
 */
final class GetDocumentedClassUrl
{
    public const DEFAULT_URL = '#';

    /**
     * @param Context $context Render context
     */
    public function __construct(private Context $context)
    {
    }

    /**
     * @param string $entityName
     *  The full name of the entity for which the URL will be retrieved.
     *  If the entity is not found, the DEFAULT_URL value will be returned.
     * @param string $cursor
     *  Cursor on the page of the documented entity (for example, the name of a method or property)
     * @param bool $createDocument
     *  If true, creates a class document. Otherwise, just gives a reference to the class code
     *
     * @return string
     */
    public function __invoke(string $entityName, string $cursor = '', bool $createDocument = true): string
    {
        if (str_contains($entityName, ' ')) {
            return self::DEFAULT_URL;
        }
        $preloadResourceLink = RenderHelper::getPreloadResourceLink($entityName, $this->context);
        if ($preloadResourceLink) {
            return $preloadResourceLink;
        }
        $rootEntityCollection = $this->context->getRootEntityCollection();
        $entity = $rootEntityCollection->getLoadedOrCreateNew($entityName);
        if ($entity->entityDataCanBeLoaded()) {
            if (!$entity->isInGit()) {
                return self::DEFAULT_URL;
            } elseif ($createDocument && is_a($entity, DocumentTransformableEntityInterface::class)) {
                $documentedClass = new DocumentedEntityWrapper(
                    $entity, $this->context->getCurrentTemplateFilePatch()
                );
                $this->context->getEntityWrappersCollection()->add($documentedClass);
                $rootEntityCollection->add($entity);
                $url = $this->context->getConfiguration()->getPageLinkProcessor()->getAbsoluteUrl($documentedClass->getDocUrl());
            } else {
                $url = $entity->getFileSourceLink(false);
            }
            if (!$url) {
                return self::DEFAULT_URL;
            }
            return $url . $entity->cursorToDocAttributeLinkFragment($cursor);
        } else {
            $this->context->getConfiguration()->getLogger()->warning(
                "GetDocumentedClassUrl: Entity {$entityName} not found in specified sources"
            );
        }
        return self::DEFAULT_URL;
    }
}
