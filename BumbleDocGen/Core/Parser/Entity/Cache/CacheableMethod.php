<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity\Cache;

use Attribute;
use BumbleDocGen\Core\Parser\Entity\Cache\CacheKey\CacheKeyGeneratorInterface;
use BumbleDocGen\Core\Parser\Entity\Cache\CacheKey\DefaultCacheKeyGenerator;

#[Attribute(Attribute::TARGET_METHOD)]
final class CacheableMethod
{
    public const HOUR_SECONDS = 3600;
    public const DAY_SECONDS = self::HOUR_SECONDS * 24;
    public const MONTH_SECONDS = self::DAY_SECONDS * 30;

    public function __construct(
        private int    $cacheSeconds = self::MONTH_SECONDS,
        private string $cacheKeyGeneratorClass = DefaultCacheKeyGenerator::class
    )
    {
        if (!is_a($cacheKeyGeneratorClass, CacheKeyGeneratorInterface::class, true)) {
            throw new \InvalidArgumentException(
                'Argument $cacheKeyGeneratorClass must implement the ' . CacheKeyGeneratorInterface::class . ' interface. ' .
                "Invalid value: `{$cacheKeyGeneratorClass}`"
            );
        }
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
