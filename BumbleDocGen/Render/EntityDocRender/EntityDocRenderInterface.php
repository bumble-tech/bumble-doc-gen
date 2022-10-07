<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\EntityDocRender;

use BumbleDocGen\Render\Context\Context;
use BumbleDocGen\Render\Context\DocumentedEntity;

interface EntityDocRenderInterface
{
    public function isAvailableForDocumentedEntity(DocumentedEntity $documentedClass): bool;

    public function setContext(Context $context): void;

    public function getRenderedText(DocumentedEntity $documentedEntity): string;
}