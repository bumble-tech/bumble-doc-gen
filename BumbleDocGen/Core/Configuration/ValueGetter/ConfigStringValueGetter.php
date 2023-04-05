<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Configuration\ValueGetter;

use BumbleDocGen\Core\Configuration\ConfigurationParameterBag;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;

final class ConfigStringValueGetter
{
    public function __construct(private ConfigurationParameterBag $parameterBag)
    {
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function validateAndGet(
        string $parameterName,
        bool   $nullable = true
    ): ?string
    {
        $value = $this->parameterBag->get($parameterName);
        if (!$nullable && !is_string($value)) {
            throw new InvalidConfigurationParameterException(
                "Configuration parameter `{$parameterName}` must contain string"
            );
        } elseif (!is_string($value) && !is_null($value)) {
            throw new InvalidConfigurationParameterException(
                "Configuration parameter `{$parameterName}` must contain string or null"
            );
        }
        return $value;
    }
}
