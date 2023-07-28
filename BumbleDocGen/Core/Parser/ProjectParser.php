<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup;
use DI\DependencyException;
use DI\NotFoundException;

/**
 * Entity for project parsing using source locators
 */
final class ProjectParser
{
    public function __construct(
        private Configuration              $configuration,
        private RootEntityCollectionsGroup $rootEntityCollectionsGroup
    )
    {
    }

    /**
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    public function parse(): RootEntityCollectionsGroup
    {
        foreach ($this->configuration->getLanguageHandlersCollection() as $languageHandler) {
            $this->rootEntityCollectionsGroup->add($languageHandler->getEntityCollection());
        }
        return $this->rootEntityCollectionsGroup;
    }
}
