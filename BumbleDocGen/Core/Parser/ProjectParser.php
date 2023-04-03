<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup;

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

    public function parse(): void
    {
        foreach ($this->configuration->getLanguageHandlersCollection() as $languageHandler) {
            $this->rootEntityCollectionsGroup->add($languageHandler->getEntityCollection());
        }
    }
}
