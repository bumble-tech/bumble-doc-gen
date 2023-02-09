<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\Entity\Cache\CacheKey;

use BumbleDocGen\Parser\Entity\BaseEntity;

final class DefaultCacheKeyGenerator implements CacheKeyGeneratorInterface
{
    public static function generateKey(string $cacheNamespace, BaseEntity $entity, array $args): string
    {
        return $cacheNamespace . md5(json_encode($args)) . $entity->getObjectId();
    }
}