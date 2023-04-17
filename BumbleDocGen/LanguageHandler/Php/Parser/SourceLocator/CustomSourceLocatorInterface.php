<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\SourceLocator;

use Roave\BetterReflection\SourceLocator\Ast\Locator;
use Roave\BetterReflection\SourceLocator\Type\SourceLocator;

interface CustomSourceLocatorInterface
{
    public function getSourceLocator(Locator $astLocator): SourceLocator;
}
