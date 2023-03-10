<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity\Cache;

use Attribute;
use BumbleDocGen\Core\Parser\Entity\Cache\CacheKey\DefaultCacheKeyGenerator;

#[Attribute]
class CacheableMethod
{
    public const HOUR_SECONDS = 3600;
    public const DAY_SECONDS = 86400;
    public const MONTH_SECONDS = self::DAY_SECONDS * 30;

    public function __construct(
        private int    $cacheSeconds = self::MONTH_SECONDS,
        private string $cacheKeyGeneratorClass = DefaultCacheKeyGenerator::class
    )
    {
    }

    public function getCacheSeconds(): int
    {
        return $this->cacheSeconds;
    }

    public function getCacheKeyGeneratorClass(): string
    {
        return $this->cacheKeyGeneratorClass;
    }
}
