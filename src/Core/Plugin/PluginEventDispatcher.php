<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Plugin;

use Monolog\Logger;
use Symfony\Component\EventDispatcher\EventDispatcher;

class PluginEventDispatcher extends EventDispatcher
{
    private array $handledSingleExecutionEvents = [];

    public function __construct(private Logger $logger)
    {
        parent::__construct();
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
        try {
            return parent::dispatch($event, $eventName);
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
        }
        return $event;
    }
}
