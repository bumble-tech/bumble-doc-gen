<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Plugin;

use Symfony\Component\EventDispatcher\EventDispatcher;

class PluginEventDispatcher extends EventDispatcher
{
    private array $handledSingleExecutionEvents = [];

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
