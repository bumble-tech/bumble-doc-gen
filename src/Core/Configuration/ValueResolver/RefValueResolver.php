<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Configuration\ValueResolver;

use BumbleDocGen\Core\Configuration\ConfigurationParameterBag;

/**
 * We supplement the values by replacing the shortcodes with real values by the configuration key
 *
 * @example # Configuration processing example
 *   project_root: "test"
 *   output_dir: "%project_root%/docs"
 *
 *   # After the value processing procedure, output_dir => "test/docs"
 */
final class RefValueResolver implements ValueResolverInterface
{
    public function resolveValue(ConfigurationParameterBag $parameterBag, mixed $value): mixed
    {
        if (is_string($value)) {
            return preg_replace_callback('/%([^%\s]+)%/', function (array $matches) use ($parameterBag): string {
                return (string)$parameterBag->get($matches[1]);
            }, $value);
        } elseif (is_array($value)) {
            foreach ($value as $k => $v) {
                $value[$k] = $this->resolveValue($parameterBag, $v);
            }
        }
        return $value;
    }
}
