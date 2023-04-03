<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Render\Context;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Render\EntityDocRender\EntityDocRenderInterface;

/**
 * Interface for entities that can be generated into documents
 */
interface DocumentTransformableEntityInterface
{
    public function getConfiguration(): Configuration;

    public function getName(): string;

    public function getShortName(): string;

    public function getDocRender(): EntityDocRenderInterface;

    public function cursorToDocAttributeLinkFragment(string $cursor, bool $isForDocument = true): string;
}
