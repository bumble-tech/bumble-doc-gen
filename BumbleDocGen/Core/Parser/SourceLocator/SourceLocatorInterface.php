<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\SourceLocator;

use Roave\BetterReflection\SourceLocator\Ast\Locator;
use Roave\BetterReflection\SourceLocator\Type\SourceLocator;
use Symfony\Component\Finder\Finder;

interface SourceLocatorInterface
{
    public function getFinder(): ?Finder;

    public function convertToReflectorSourceLocator(Locator $astLocator): ?SourceLocator;
}
