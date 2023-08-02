<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Configuration\ValueResolver;

use BumbleDocGen\Core\Configuration\ConfigurationParameterBag;

/**
 * We supplement the values by replacing the shortcodes with real values by
 * the arguments passed to the script when running from the command line;
 * Template: %argv:param_num% , where param_num is the number of the argument passed to the script
 *
 * @example # Configuration processing example.
 *   # In case passing argument 3 => 'test'
 *   output_dir: "%argv:3%/docs"
 *
 *   # After the value processing procedure, output_dir => "test/docs"
 */
final class ArgvValueResolver implements ValueResolverInterface
{
    public function resolveValue(ConfigurationParameterBag $parameterBag, mixed $value): mixed
    {
        if (is_string($value)) {
            return preg_replace_callback('/%((argv:)([^%\s]+))%/', function (array $matches): ?string {
                if (PHP_SAPI === 'cli' && array_key_exists($matches[3], $_SERVER['argv'])) {
                    return $_SERVER['argv'][$matches[3]];
                }
                return null;
            }, $value);
        } elseif (is_array($value)) {
            foreach ($value as $k => $v) {
                $value[$k] = $this->resolveValue($parameterBag, $v);
            }
        }
        return $value;
    }
}
