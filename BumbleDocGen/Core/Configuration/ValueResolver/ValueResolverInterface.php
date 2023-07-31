<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Configuration\ValueResolver;

use BumbleDocGen\Core\Configuration\ConfigurationParameterBag;

/**
 * Class interface to resolve value from config file
 */
interface ValueResolverInterface
{
    public function resolveValue(ConfigurationParameterBag $parameterBag, mixed $value): mixed;
}
