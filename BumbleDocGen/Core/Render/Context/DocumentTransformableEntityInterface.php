<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Render\Context;

use BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
use BumbleDocGen\Core\Render\EntityDocRender\EntityDocRenderInterface;

/**
 * Interface for entities that can be generated into documents
 */
interface DocumentTransformableEntityInterface
{
    public function getRootEntityCollection(): RootEntityCollection;

    public function getName(): string;

    public function getShortName(): string;

    public function entityCacheIsOutdated(): bool;

    public function getDocRender(): EntityDocRenderInterface;

    public function cursorToDocAttributeLinkFragment(string $cursor, bool $isForDocument = true): string;
}
