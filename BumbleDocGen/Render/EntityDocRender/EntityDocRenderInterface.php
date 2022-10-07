<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\EntityDocRender;

use BumbleDocGen\Render\Context\Context;
use BumbleDocGen\Render\Context\DocumentedClass;

interface EntityDocRenderInterface
{
    public function setContext(Context $context): void;

    public function getRenderedText(DocumentedClass $documentedClass): string;
}