<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Configuration\ValueGetter;

use BumbleDocGen\Core\Configuration\ConfigurationParameterBag;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Configuration\ValueTransformer\ValueToClassTransformer;

final class ClassValueGetter
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
        string $classInterfaceName
    ): object
    {
        $value = $this->parameterBag->get($parameterName);
        $valueObject = $this->valueToClassTransformer->transform($value);
        if (is_null($valueObject)) {
            throw new InvalidConfigurationParameterException(
                "Configuration parameter `{$parameterName}` must contain the name of class"
            );
        }
        if (!$valueObject instanceof $classInterfaceName) {
            throw new InvalidConfigurationParameterException(
                "Configuration parameter `{$parameterName}` must implement the `\\{$classInterfaceName}` interface"
            );
        }
        return $valueObject;
    }
}
