<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\EntityDocRender;

use BumbleDocGen\Render\Context\Context;
use BumbleDocGen\Render\Context\DocumentedEntityWrapper;

/**
 * Entity documentation render interface
 */
interface EntityDocRenderInterface
{
    /**
     * Can this render be used to create entity documentation
     *
     * @param DocumentedEntityWrapper $entityWrapper The class whose documentation was requested
     * @return bool
     */
    public function isAvailableForEntity(DocumentedEntityWrapper $entityWrapper): bool;

    public function setContext(Context $context): void;

    /**
     * Get rendered documentation for an entity
     *
     * @param DocumentedEntityWrapper $entityWrapper The class whose documentation was requested
     * @return string
     */
    public function getRenderedText(DocumentedEntityWrapper $entityWrapper): string;

    public function getDocFileExtension(): string;
}