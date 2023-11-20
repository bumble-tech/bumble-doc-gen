<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer\Context;

use BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
use BumbleDocGen\Core\Renderer\EntityDocRenderer\EntityDocRendererInterface;

/**
 * Interface for entities that can be generated into documents
 */
interface DocumentTransformableEntityInterface
{
    public function getRootEntityCollection(): RootEntityCollection;

    public function getName(): string;

    public function isDocumentCreationAllowed(): bool;

    public function getShortName(): string;

    public function entityCacheIsOutdated(): bool;

    public function getDocRender(): EntityDocRendererInterface;

    public function cursorToDocAttributeLinkFragment(string $cursor, bool $isForDocument = true): string;
}
