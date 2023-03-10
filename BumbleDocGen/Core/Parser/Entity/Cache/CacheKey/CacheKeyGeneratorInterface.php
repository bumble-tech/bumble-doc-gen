<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity\Cache\CacheKey;

interface CacheKeyGeneratorInterface
{
    public static function generateKey(string $cacheNamespace, CacheableEntityInterface $entity, array $args): string;
}
