<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\ParsedFileDocRender;

use BumbleDocGen\Render\Context\Context;
use BumbleDocGen\Render\Context\DocumentedClass;

interface ParsedFileDocRenderInterface
{
    public function setContext(Context $context): void;

    public function getRenderedText(DocumentedClass $documentedClass): string;
}