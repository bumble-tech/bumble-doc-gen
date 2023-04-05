<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Configuration\ValueGetter;

use BumbleDocGen\Core\Configuration\ConfigurationParameterBag;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Configuration\ValueTransformer\ValueToClassTransformer;

final class ConfigClassListValueGetter
{
    public function __construct(
        private ValueToClassTransformer   $valueToClassTransformer,
        private ConfigurationParameterBag $parameterBag
    )
    {
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function validateAndGet(
        string $parameterName,
        string $classInterfaceName,
        bool   $nullable = true
    ): array
    {
        $preparedValues = [];
        $values = $this->parameterBag->get($parameterName);
        if (is_null($values) && $nullable) {
            $values = [];
        }
        if (!is_array($values)) {
            throw new InvalidConfigurationParameterException("Parameter `{$parameterName}` must be an array");
        }
        foreach ($values as $i => $value) {
            $valueObject = $this->valueToClassTransformer->transform($value);
            if (is_null($valueObject)) {
                throw new InvalidConfigurationParameterException(
                    "Configuration parameter `{$parameterName}[{$i}]` must contain the name of class"
                );
            }
            if (!$valueObject instanceof $classInterfaceName) {
                throw new InvalidConfigurationParameterException(
                    "Configuration parameter `{$parameterName}[{$i}]` must implement the `\\{$classInterfaceName}` interface"
                );
            }
            $preparedValues[$i] = $valueObject;
        }
        return $preparedValues;
    }
}
