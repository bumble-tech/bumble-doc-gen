<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup;
use BumbleDocGen\Core\Plugin\Event\Parser\BeforeParsingProcess;
use BumbleDocGen\Core\Plugin\PluginEventDispatcher;
use DI\DependencyException;
use DI\NotFoundException;

/**
 * Entity for project parsing using source locators
 */
final class ProjectParser
{
    public function __construct(
        private Configuration $configuration,
        private PluginEventDispatcher $pluginEventDispatcher,
        private RootEntityCollectionsGroup $rootEntityCollectionsGroup
    ) {
    }

    /**
     * @api
     *
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    public function parse(): RootEntityCollectionsGroup
    {
        $this->pluginEventDispatcher->dispatch(new BeforeParsingProcess());
        foreach ($this->configuration->getLanguageHandlersCollection() as $languageHandler) {
            $collection = $languageHandler->getEntityCollection();
            $collection->loadEntitiesByConfiguration();
            $this->rootEntityCollectionsGroup->add($collection);
        }
        return $this->rootEntityCollectionsGroup;
    }

    /**
     * @api
     *
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public function getEntityCollectionForPL(string $plHandlerClassName): ?RootEntityCollection
    {
        return $this->configuration
            ->getLanguageHandlersCollection()
            ->get($plHandlerClassName)
            ?->getEntityCollection();
    }
}
