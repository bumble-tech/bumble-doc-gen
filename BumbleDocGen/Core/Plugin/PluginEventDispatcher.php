<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Plugin;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use DI\DependencyException;
use DI\NotFoundException;
use Symfony\Component\EventDispatcher\EventDispatcher;

class PluginEventDispatcher extends EventDispatcher
{
    private array $handledSingleExecutionEvents = [];

    /**
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public function __construct(Configuration $configuration)
    {
        parent::__construct();
        foreach ($configuration->getPlugins() as $plugin) {
            $this->addSubscriber($plugin);
        }
    }

    public function dispatch(object $event, string $eventName = null): object
    {
        if ($event instanceof OnlySingleExecutionEvent) {
            $uniqueExecutionId = $event->getUniqueExecutionId();
            if (array_key_exists($uniqueExecutionId, $this->handledSingleExecutionEvents)) {
                return $event;
            } else {
                $this->handledSingleExecutionEvents[$uniqueExecutionId] = true;
            }
        }
        return parent::dispatch($event, $eventName);
    }
}
