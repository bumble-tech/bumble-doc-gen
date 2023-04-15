<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity\Cache\CacheKey;

use BumbleDocGen\Core\Renderer\Context\RendererContext;

final class RenderContextCacheKeyGenerator implements CacheKeyGeneratorInterface
{
    public static function generateKey(string $cacheNamespace, CacheableEntityInterface $entity, array $args): string
    {
        $args = array_map(function ($arg) {
            if (is_a($arg, RendererContext::class)) {
                return $arg->getCurrentTemplateFilePatch();
            }
            return $arg;
        }, $args);
        return $cacheNamespace . md5(json_encode($args)) . $entity->getObjectId();
    }
}
