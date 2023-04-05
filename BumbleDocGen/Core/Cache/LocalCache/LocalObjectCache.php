<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Cache\LocalCache;

use BumbleDocGen\Core\Cache\LocalCache\Exception\InvalidCallContextException;
use BumbleDocGen\Core\Cache\LocalCache\Exception\ObjectNotFoundException;

final class LocalObjectCache
{
    private array $cache = [];

    /**
     * @throws InvalidCallContextException
     */
    private function getCallerCacheKey(): string
    {
        $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 3);
        $callerClassName = $backtrace[2]['class'] ?? null;
        $callerMethodName = $backtrace[2]['function'] ?? null;
        if (is_null($callerClassName) || is_null($callerMethodName)) {
            throw new InvalidCallContextException();
        }
        return "{$callerClassName}::{$callerMethodName}";
    }

    /**
     * @throws InvalidCallContextException
     */
    public function cacheCurrentMethodResult(?string $objectId, mixed $methodResult): void
    {
        $cacheKey = $this->getCallerCacheKey();
        $this->cache[$cacheKey][$objectId] = $methodResult;
    }

    public function cacheCurrentMethodResultSilently(?string $objectId, mixed $methodResult): void
    {
        try {
            $this->cacheCurrentMethodResult($objectId, $methodResult);
        } catch (\Exception) {
        }
    }

    /**
     * @throws ObjectNotFoundException
     * @throws InvalidCallContextException
     */
    public function getCurrentMethodCachedResult(?string $objectId): mixed
    {
        $cacheKey = $this->getCallerCacheKey();
        if (!array_key_exists($cacheKey, $this->cache) || !array_key_exists($objectId, $this->cache[$cacheKey])) {
            throw new ObjectNotFoundException();
        }
        return $this->cache[$cacheKey][$objectId];
    }
}
