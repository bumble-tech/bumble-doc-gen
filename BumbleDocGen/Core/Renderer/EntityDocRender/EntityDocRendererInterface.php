<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer\EntityDocRender;

use BumbleDocGen\Core\Parser\Entity\RootEntityInterface;
use BumbleDocGen\Core\Renderer\Context\DocumentedEntityWrapper;

/**
 * Entity documentation renderer interface
 */
interface EntityDocRendererInterface
{
    /**
     * Can this render be used to create entity documentation
     *
     * @param RootEntityInterface $entity The entity whose documentation was requested
     * @return bool
     */
    public function isAvailableForEntity(RootEntityInterface $entity): bool;

    /**
     * Get rendered documentation for an entity
     *
     * @param DocumentedEntityWrapper $entityWrapper The entity whose documentation was requested
     * @return string
     */
    public function getRenderedText(DocumentedEntityWrapper $entityWrapper): string;

    public function getDocFileExtension(): string;

    public function getDocFileNamespace(): string;
}