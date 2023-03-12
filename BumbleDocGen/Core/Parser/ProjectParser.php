<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup;
use BumbleDocGen\Core\Plugin\PluginEventDispatcher;

/**
 * Class for project parsing using source locators
 */
final class ProjectParser
{
    private function __construct(
        private ConfigurationInterface $configuration,
        private PluginEventDispatcher  $pluginEventDispatcher
    )
    {
    }

    public static function create(
        ConfigurationInterface $configuration,
        PluginEventDispatcher  $pluginEventDispatcher
    ): ProjectParser
    {
        return new self($configuration, $pluginEventDispatcher);
    }

    public function parse(): RootEntityCollectionsGroup
    {
        $rootEntityCollectionsGroup = new RootEntityCollectionsGroup();
        foreach ($this->configuration->getLanguageHandlersCollection(
            $this->pluginEventDispatcher
        ) as $languageHandler) {
            $rootEntityCollectionsGroup->add($languageHandler->getEntityCollection());
        }
        return $rootEntityCollectionsGroup;
    }
}
