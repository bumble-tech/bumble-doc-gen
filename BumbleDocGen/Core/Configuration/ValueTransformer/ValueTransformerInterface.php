<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Configuration\ValueTransformer;

/**
 * Interface defining classes that transform text configuration values into objects
 */
interface ValueTransformerInterface
{
    public function canTransform(mixed $value): bool;

    public function transform(mixed $value): mixed;
}
