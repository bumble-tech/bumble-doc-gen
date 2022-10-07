<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\EntityDocRender;

use BumbleDocGen\Render\Context\Context;
use BumbleDocGen\Render\Context\DocumentedEntityWrapper;

interface EntityDocRenderInterface
{
    public function isAvailableForEntity(DocumentedEntityWrapper $entityWrapper): bool;

    public function setContext(Context $context): void;

    public function getRenderedText(DocumentedEntityWrapper $entityWrapper): string;
}