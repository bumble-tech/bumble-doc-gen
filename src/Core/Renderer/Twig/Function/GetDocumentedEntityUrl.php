<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer\Twig\Function;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
use BumbleDocGen\Core\Renderer\Context\RendererContext;
use BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrapper;
use BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrappersCollection;
use BumbleDocGen\Core\Renderer\Context\DocumentTransformableEntityInterface;
use BumbleDocGen\Core\Renderer\RendererHelper;
use DI\DependencyException;
use DI\NotFoundException;
use Monolog\Logger;

/**
 * Get the URL of a documented entity by its name. If the entity is found, next to the file where this method was called,
 * the `EntityDocRendererInterface::getDocFileExtension()` directory will be created, in which the documented entity file will be created
 *
 * @note This function initiates the creation of documents for the displayed entities
 * @see DocumentedEntityWrapper
 * @see DocumentedEntityWrappersCollection
 * @see RendererContext::$entityWrappersCollection
 *
 * @example {{ getDocumentedEntityUrl(phpClassEntityCollection, '\\BumbleDocGen\\Renderer\\Twig\\MainExtension', 'getFunctions') }}
 *  The function returns a reference to the documented entity, anchored to the getFunctions method
 *
 * @example {{ getDocumentedEntityUrl(phpClassEntityCollection, '\\BumbleDocGen\\Renderer\\Twig\\MainExtension') }}
 *  The function returns a reference to the documented entity MainExtension
 *
 * @example {{ getDocumentedEntityUrl(phpClassEntityCollection, '\\BumbleDocGen\\Renderer\\Twig\\MainExtension', '', false) }}
 *  The function returns a link to the file MainExtension
 */
final class GetDocumentedEntityUrl implements CustomFunctionInterface
{
    public const DEFAULT_URL = '#';

    public function __construct(
        private RendererHelper $rendererHelper,
        private DocumentedEntityWrappersCollection $documentedEntityWrappersCollection,
        private Configuration $configuration,
        private Logger $logger
    ) {
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
     * @param RootEntityCollection $rootEntityCollection Processed entity collection
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
     */
    public function __invoke(RootEntityCollection $rootEntityCollection, string $entityName, string $cursor = '', bool $createDocument = true): string
    {
        if (str_contains($entityName, ' ')) {
            return self::DEFAULT_URL;
        }
        $preloadResourceLink = $this->rendererHelper->getPreloadResourceLink($entityName);
        if ($preloadResourceLink) {
            return $preloadResourceLink;
        }
        $entity = $rootEntityCollection->getLoadedOrCreateNew($entityName);
        if ($entity->isEntityDataCanBeLoaded()) {
            if (!$entity->documentCreationAllowed()) {
                return self::DEFAULT_URL;
            } elseif ($createDocument && is_a($entity, DocumentTransformableEntityInterface::class)) {
                $documentedEntity = $this->documentedEntityWrappersCollection->createAndAddDocumentedEntityWrapper($entity);
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
            $this->logger->warning(
                "GetDocumentedEntityUrl: Entity {$entityName} not found in specified sources"
            );
        }
        return self::DEFAULT_URL;
    }
}
