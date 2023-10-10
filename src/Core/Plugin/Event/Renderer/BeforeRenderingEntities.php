<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Plugin\Event\Renderer;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollectionsGroup;
use Symfony\Contracts\EventDispatcher\Event;

final class BeforeRenderingEntities extends Event
{
    public function __construct(
        private Configuration $configuration,
        private RootEntityCollectionsGroup $rootEntityCollectionsGroup
    ) {
    }

    public function getConfiguration(): Configuration
    {
        return $this->configuration;
    }

    public function getRootEntityCollectionsGroup(): RootEntityCollectionsGroup
    {
        return $this->rootEntityCollectionsGroup;
    }
}
