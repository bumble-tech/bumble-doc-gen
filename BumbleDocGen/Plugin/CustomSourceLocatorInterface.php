<?php

declare(strict_types=1);

namespace BumbleDocGen\Plugin;

use BumbleDocGen\Parser\SourceLocator\SourceLocatorInterface;

/**
 * Plugin for working with custom source locators. Why? -sometimes it is better to move the complex logic of resource
 * locators out of the configurator into a separate plugin.
 *
 */
interface CustomSourceLocatorInterface extends PluginInterface
{
    /**
     * Method for getting custom resource locator
     *
     * @see ProjectParser::create()
     */
    public function getSourceLocator(): SourceLocatorInterface;
}
