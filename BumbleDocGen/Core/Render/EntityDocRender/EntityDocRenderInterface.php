<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Render\EntityDocRender;

use BumbleDocGen\Core\Parser\Entity\RootEntityInterface;
use BumbleDocGen\Core\Render\Context\Context;
use BumbleDocGen\Core\Render\Context\DocumentedEntityWrapper;

/**
 * Entity documentation render interface
 */
interface EntityDocRenderInterface
{
    /**
     * Can this render be used to create entity documentation
     *
     * @param RootEntityInterface $entity The entity whose documentation was requested
     * @return bool
     */
    public function isAvailableForEntity(RootEntityInterface $entity): bool;

    public function setContext(Context $context): void;

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