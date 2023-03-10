<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity\Cache\CacheKey;

use BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity;

interface CacheKeyGeneratorInterface
{
    public static function generateKey(string $cacheNamespace, BaseEntity $entity, array $args): string;
}
