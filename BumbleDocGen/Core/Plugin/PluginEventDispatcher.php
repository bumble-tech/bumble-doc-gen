<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Plugin;

use BumbleDocGen\Core\Configuration\Configuration;
use Symfony\Component\EventDispatcher\EventDispatcher;

class PluginEventDispatcher extends EventDispatcher
{
    public function __construct(Configuration $configuration)
    {
        parent::__construct();
        foreach ($configuration->getPlugins() as $plugin) {
            $this->addSubscriber($plugin);
        }
    }
}
