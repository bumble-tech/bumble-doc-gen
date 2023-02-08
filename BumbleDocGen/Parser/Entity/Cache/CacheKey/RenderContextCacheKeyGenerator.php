<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\Entity\Cache\CacheKey;

use BumbleDocGen\Parser\Entity\BaseEntity;
use BumbleDocGen\Render\Context\Context;

final class RenderContextCacheKeyGenerator implements CacheKeyGeneratorInterface
{
    public static function generateKey(string $cacheNamespace, BaseEntity $entity, array $args): string
    {
        $args = array_map(function ($arg) {
            if (is_a($arg, Context::class)) {
                return $arg->getCurrentTemplateFilePatch();
            }
            return $arg;
        }, $args);
        return $cacheNamespace . md5(json_encode($args)) . $entity->getObjectId();
    }
}
