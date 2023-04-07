<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Render\Twig\Function;

use BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache;
use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
use BumbleDocGen\Core\Render\Context\RenderContext;
use BumbleDocGen\Core\Render\Context\DocumentedEntityWrapper;
use BumbleDocGen\Core\Render\Context\DocumentedEntityWrappersCollection;
use BumbleDocGen\Core\Render\Context\DocumentTransformableEntityInterface;
use BumbleDocGen\Core\Render\RenderHelper;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException;
use DI\DependencyException;
use DI\NotFoundException;

/**
 * Get the URL of a documented entity by its name. If the entity is found, next to the file where this method was called,
 * the `EntityDocRenderInterface::getDocFileExtension()` directory will be created, in which the documented entity file will be created
 *
 * @note This function initiates the creation of documents for the displayed entities
 * @see DocumentedEntityWrapper
 * @see DocumentedEntityWrappersCollection
 * @see RenderContext::$entityWrappersCollection
 *
 * @example {{ getDocumentedEntityUrl(entityCollection , '\\BumbleDocGen\\Render\\Twig\\MainExtension', 'getFunctions') }}
 * @example {{ getDocumentedEntityUrl(entityCollection , '\\BumbleDocGen\\Render\\Twig\\MainExtension') }}
 * @example {{ getDocumentedEntityUrl(entityCollection , '\\BumbleDocGen\\Render\\Twig\\MainExtension', '', false) }}
 */
final class GetDocumentedEntityUrl implements CustomFunctionInterface
{
    public const DEFAULT_URL = '#';

    public function __construct(
        private RenderContext                      $context,
        private RenderHelper                       $renderHelper,
        private DocumentedEntityWrappersCollection $documentedEntityWrappersCollection,
        private Configuration                      $configuration,
        private LocalObjectCache                   $localObjectCache
    )
    {
    }

    public static function getName(): string
    {
        return 'getDocumentedEntityUrl';
    }

    public static function getOptions(): array
    {
        return [
            'is_safe' => ['html'],
        ];
    }

    /**
     * @param RootEntityCollection $rootEntityCollection
     * @param string $entityName
     *  The full name of the entity for which the URL will be retrieved.
     *  If the entity is not found, the DEFAULT_URL value will be returned.
     * @param string $cursor
     *  Cursor on the page of the documented entity (for example, the name of a method or property)
     * @param bool $createDocument
     *  If true, creates an entity document. Otherwise, just gives a reference to the entity code
     *
     * @return string
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     * @throws ReflectionException
     */
    public function __invoke(RootEntityCollection $rootEntityCollection, string $entityName, string $cursor = '', bool $createDocument = true): string
    {
        if (str_contains($entityName, ' ')) {
            return self::DEFAULT_URL;
        }
        $preloadResourceLink = $this->renderHelper->getPreloadResourceLink($entityName);
        if ($preloadResourceLink) {
            return $preloadResourceLink;
        }
        $entity = $rootEntityCollection->getLoadedOrCreateNew($entityName);
        if ($entity->entityDataCanBeLoaded()) {
            if (!$entity->isInGit()) {
                return self::DEFAULT_URL;
            } elseif ($createDocument && is_a($entity, DocumentTransformableEntityInterface::class)) {
                $documentedEntity = new DocumentedEntityWrapper(
                    $entity,
                    $this->localObjectCache,
                    $this->context->getCurrentTemplateFilePatch()
                );
                $this->documentedEntityWrappersCollection->add($documentedEntity);
                $rootEntityCollection->add($entity);
                $url = $this->configuration->getPageLinkProcessor()->getAbsoluteUrl($documentedEntity->getDocUrl());
            } else {
                $url = $entity->getFileSourceLink(false);
            }
            if (!$url) {
                return self::DEFAULT_URL;
            }
            return $url . $entity->cursorToDocAttributeLinkFragment($cursor);
        } else {
            $this->configuration->getLogger()->warning(
                "GetDocumentedEntityUrl: Entity {$entityName} not found in specified sources"
            );
        }
        return self::DEFAULT_URL;
    }
}
