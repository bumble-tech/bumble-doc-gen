<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler;

use BumbleDocGen\Parser\Entity\RootEntityCollection;

interface LanguageHandlerInterface
{
    public static function getLanguageKey(): string;

    public function loadEntityCollection(): RootEntityCollection;
}