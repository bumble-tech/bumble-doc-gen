<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\Entity\Cache;

use Attribute;

#[Attribute]
class CacheableMethod
{
    public const HOUR_SECONDS = 3600;
    public const DAY_SECONDS = 86400;
    public const MONTH_SECONDS = self::DAY_SECONDS * 30;

    public function __construct(private int $cacheSeconds = self::MONTH_SECONDS)
    {
    }

    public function getCacheSeconds(): int
    {
        return $this->cacheSeconds;
    }
}
