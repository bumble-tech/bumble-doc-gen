<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\SourceLocator;

use Symfony\Component\Finder\Finder;

interface SourceLocatorInterface
{
    public function getFinder(): ?Finder;
}
