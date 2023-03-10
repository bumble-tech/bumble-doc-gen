<?php

namespace BumbleDocGen\Core\Parser\Entity\Cache\CacheKey;

interface CacheableEntityInterface
{
    public function getObjectId(): string;
}