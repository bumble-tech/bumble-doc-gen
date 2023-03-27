<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Configuration\ValueTransformer;

interface ValueTransformerInterface
{
    public function canTransform(mixed $value): bool;

    public function transform(mixed $value): mixed;
}