<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\SourceLocator;

use Roave\BetterReflection\SourceLocator\Ast\Locator;
use Roave\BetterReflection\SourceLocator\Type\SourceLocator;

interface SourceLocatorInterface
{
    public function convertToReflectorSourceLocator(Locator $astLocator): SourceLocator;
}
