<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity\Cache\CacheKey;

final class DefaultCacheKeyGenerator implements CacheKeyGeneratorInterface
{
    public static function generateKey(string $cacheNamespace, CacheableEntityInterface $entity, array $args): string
    {
        return $cacheNamespace . md5(json_encode($args)) . $entity->getObjectId();
    }
}
