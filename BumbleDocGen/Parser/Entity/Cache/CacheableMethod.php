<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\Entity\Cache;

use Attribute;

#[Attribute]
class CacheableMethod
{
    public function __construct(public int $cacheSeconds = 604800)
    {
    }

    public function getCacheSeconds(): int
    {
        return $this->cacheSeconds;
    }
}
