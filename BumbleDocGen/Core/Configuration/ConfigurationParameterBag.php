<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Configuration;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Configuration\ValueResolver\ValueResolverInterface;
use BumbleDocGen\Core\Configuration\ValueTransformer\ValueToClassTransformer;
use InvalidArgumentException;
use Symfony\Component\Yaml\Yaml;

use function BumbleDocGen\Core\is_associative_array;

final class ConfigurationParameterBag
{
    private array $parameters = [];

    /**
     * @param ValueResolverInterface[] $resolvers
     */
    public function __construct(
        private ValueToClassTransformer $valueToClassTransformer,
        private array                   $resolvers
    )
    {
    }

    public function loadFromFiles(string ...$fileNames): void
    {
        foreach ($fileNames as $fileName) {
            $parameters = Yaml::parseFile($fileName);
            $this->loadFromArray($parameters);
        }
    }

    public function loadFromArray(array $parameters): void
    {
        foreach ($parameters as $name => $value) {
            $this->set($name, $value);
        }
    }

    public function getSubConfigurationParameterBag(string $parentKey): ConfigurationParameterBag
    {
        $configurationParameterBag = new ConfigurationParameterBag($this->valueToClassTransformer, $this->resolvers);
        $childParameters = $this->get($parentKey);
        if (!is_associative_array($childParameters)) {
            throw new InvalidArgumentException('The sub configuration value must be an associative array');
        }
        foreach ($childParameters as $name => $value) {
            $configurationParameterBag->set($name, $value);
        }
        return $configurationParameterBag;
    }

    public function set(string $name, mixed $value): void
    {
        $keys = explode('.', $name);
        foreach ($keys as $key) {
            $value = [$key => $value];
        }
        $this->parameters = array_merge_recursive($value, $this->parameters);
    }

    public function addValueIfNotExists(string $name, mixed $value): void
    {
        $keys = array_reverse(explode('.', $name));
        foreach ($keys as $key) {
            if ($key) {
                $value = [$key => $value];
            }
        }
        $this->parameters = array_replace_recursive($value, $this->parameters);
    }

    public function addValueFromFileIfNotExists(string $name, string $fileName): void
    {
        $this->addValueIfNotExists($name, Yaml::parseFile($fileName));
    }

    /**
     * @throws InvalidArgumentException
     */
    public function get(string $name): mixed
    {
        $keys = explode('.', $name);

        $value = $this->parameters;
        foreach ($keys as $key) {
            if (!array_key_exists($key, $value)) {
                throw new InvalidArgumentException(sprintf('The parameter "%s" does not exist.', $name));
            }
            $value = $value[$key];
        }

        foreach ($this->resolvers as $resolver) {
            $value = $resolver->resolveValue($this, $value);
        }
        return $value;
    }

    public function has($name): bool
    {
        return isset($this->parameters[$name]);
    }

    public function getAll(): array
    {
        $parameters = [];
        foreach ($this->parameters as $name => $value) {
            $parameters[$name] = $this->get($name);
        }
        return $parameters;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function validateAndGetStringValue(
        string $parameterName,
        bool   $nullable = true
    ): ?string
    {
        $value = $this->get($parameterName);
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

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function validateAndGetClassValue(
        string $parameterName,
        string $classInterfaceName
    ): object
    {
        $value = $this->get($parameterName);
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

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function validateAndGetClassListValue(
        string $parameterName,
        string $classInterfaceName,
        bool   $nullable = true
    ): array
    {
        $preparedValues = [];
        $values = $this->get($parameterName);
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

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function validateAndGetBooleanValue(string $parameterName): bool
    {
        $value = $this->get($parameterName);
        if (!is_bool($value)) {
            throw new InvalidConfigurationParameterException("Parameter `{$parameterName}` must be boolean");
        }
        return $value;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function validateAndGetFilePathValue(
        string $parameterName,
        string $fileExtension,
        bool   $nullable = true
    ): ?string
    {
        $value = $this->get($parameterName);
        if (!$nullable && !is_string($value)) {
            throw new InvalidConfigurationParameterException(
                "Configuration parameter `{$parameterName}` must contain string"
            );
        } elseif (!is_string($value) && !is_null($value)) {
            throw new InvalidConfigurationParameterException(
                "Configuration parameter `{$parameterName}` must contain string or null"
            );
        }
        if (is_null($value)) {
            return null;
        }
        if (!is_file($parameterName)) {
            throw new InvalidConfigurationParameterException(
                "Configuration parameter `{$parameterName}` must contain exists file path"
            );
        }
        if (!str_ends_with($parameterName, ".{$fileExtension}")) {
            throw new InvalidConfigurationParameterException(
                "Configuration parameter `{$parameterName}` must contain path to file with extension `{$fileExtension}`"
            );
        }
        return $value;
    }
}
