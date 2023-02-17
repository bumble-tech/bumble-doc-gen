<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler;

use BumbleDocGen\Parser\Entity\RootEntityCollection;
use BumbleDocGen\Render\EntityDocRender\EntityDocRenderInterface;

interface LanguageHandlerInterface
{
    public static function getLanguageKey(): string;

    public function getEntityDocRender(): EntityDocRenderInterface;

    public function loadEntityCollection(): RootEntityCollection;
}