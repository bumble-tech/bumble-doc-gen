<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Configuration\ValueGetter;

use BumbleDocGen\Core\Configuration\ConfigurationParameterBag;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;

final class ConfigBooleanValueGetter
{
    public function __construct(private ConfigurationParameterBag $parameterBag)
    {
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function validateAndGet(string $parameterName): bool
    {
        $value = $this->parameterBag->get($parameterName);
        if (!is_bool($value)) {
            throw new InvalidConfigurationParameterException("Parameter `{$parameterName}` must be boolean");
        }
        return $value;
    }
}
