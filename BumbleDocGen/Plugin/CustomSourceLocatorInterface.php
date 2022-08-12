<?php

declare(strict_types=1);

namespace BumbleDocGen\Plugin;

use BumbleDocGen\Parser\SourceLocator\SourceLocatorInterface;

interface CustomSourceLocatorInterface extends PluginInterface
{
    public function getSourceLocator(): SourceLocatorInterface;
}
