<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Configuration\ValueResolver;

use BumbleDocGen\Core\Configuration\ConfigurationParameterBag;

/**
 * We supplement the values by replacing the shortcodes with real values by internalValuesMap
 *
 * @example # Configuration processing example.
 *   # $internalValuesMap = ['WORKING_DIR' => 'someValue'];
 *   output_dir: "%WORKING_DIR%/docs"
 *
 *   # After the value processing procedure, output_dir => "someValue/docs"
 */
final class InternalValueResolver implements ValueResolverInterface
{
    /**
     * @param array $internalValuesMap see BumbleDocGen/di-config.php
     */
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
