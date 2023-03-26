<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Configuration\ValueResolver;

use BumbleDocGen\Core\Configuration\ConfigurationParameterBag;

final class InternalValueResolver implements ValueResolverInterface
{
    public function __construct(private array $internalValuesMap)
    {
    }

    public function resolveValue(ConfigurationParameterBag $parameterBag, mixed $value): mixed
    {
        if (is_string($value)) {
            return preg_replace_callback('/%([^%\s]+)%/', function (array $matches): string {
                if (!isset($this->internalValuesMap[$matches[1]])) {
                    return $matches[0];
                }
                return (string)$this->internalValuesMap[$matches[1]];
            }, $value);
        } elseif (is_array($value)) {
            foreach ($value as $k => $v) {
                $value[$k] = $this->resolveValue($parameterBag, $v);
            }
        }
        return $value;
    }
}
