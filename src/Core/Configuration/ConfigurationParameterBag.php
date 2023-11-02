<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Configuration;

use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Configuration\ValueResolver\ValueResolverInterface;
use BumbleDocGen\Core\Configuration\ValueTransformer\ValueToClassTransformer;
use DI\DependencyException;
use DI\NotFoundException;
use InvalidArgumentException;
use Noodlehaus\Config;

use function BumbleDocGen\Core\is_associative_array;

/**
 * Wrapper for getting raw configuration file data
 */
final class ConfigurationParameterBag
{
    private array $parameters = [];
    private ?string $lastConfigVersion = null;

    /**
     * @param ValueResolverInterface[] $resolvers
     */
    public function __construct(
        private ValueToClassTransformer $valueToClassTransformer,
        private array $resolvers
    ) {
    }

    public function getConfigVersion(): string
    {
        if (is_null($this->lastConfigVersion)) {
            $this->lastConfigVersion = md5(serialize($this->getAll(false)));
        }
        return $this->lastConfigVersion;
    }

    public function getConfigValues(string ...$configurationFiles): array
    {
        $values = [];
        do {
            $conf = Config::load($configurationFiles);
            $configurationFiles = $this->resolveValue($conf->get('parent_configuration'));
            $values = $this->mergeConfigParams($conf->all(), $values);
        } while (!is_null($configurationFiles));
        return $values;
    }

    public function loadFromFiles(string ...$fileNames): void
    {
        $this->loadFromArray($this->getConfigValues(...$fileNames));
    }

    public function loadFromArray(array $parameters): void
    {
        $this->lastConfigVersion = null;
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
        $this->parameters = $this->mergeConfigParams($this->parameters, $value);
    }

    public function addValueIfNotExists(string $name, mixed $value): void
    {
        $this->lastConfigVersion = null;
        $keys = array_reverse(explode('.', $name));
        foreach ($keys as $key) {
            if ($key) {
                $value = [$key => $value];
            }
        }
        $this->parameters = $this->mergeConfigParams($value, $this->parameters);
    }

    public function addValueFromFileIfNotExists(string $name, string ...$fileNames): void
    {
        $this->addValueIfNotExists($name, $this->getConfigValues(...$fileNames));
    }

    /**
     * @throws InvalidArgumentException
     */
    public function get(string $name, bool $useResolvers = true): mixed
    {
        $keys = explode('.', $name);

        $value = $this->parameters;
        foreach ($keys as $key) {
            if (!array_key_exists($key, $value)) {
                throw new InvalidArgumentException(sprintf('The parameter "%s" does not exist.', $name));
            }
            $value = $value[$key];
        }
        $value = $useResolvers ? $this->resolveValue($value) : $value;
        if (is_array($value) || is_null($value)) {
            return $value;
        }
        // handle OR operation
        if (is_string($value)) {
            $value = array_values(
                array_filter(
                    explode("\n", $value),
                    fn(string $val) => mb_strlen($val) > 0
                )
            );
            $value = $value[0] ?? null;
        }
        return $value;
    }

    public function resolveValue(mixed $value): mixed
    {
        foreach ($this->resolvers as $resolver) {
            $value = $resolver->resolveValue($this, $value);
        }
        return $value;
    }

    public function has($name): bool
    {
        return isset($this->parameters[$name]);
    }

    public function getAll(bool $useResolvers = true): array
    {
        $parameters = [];
        foreach ($this->parameters as $name => $value) {
            $parameters[$name] = $this->get($name, $useResolvers);
        }
        ksort($parameters);
        return $parameters;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function validateAndGetStringValue(
        string $parameterName,
        bool $nullable = true
    ): ?string {
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
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    public function validateAndGetClassValue(
        string $parameterName,
        string $classInterfaceName
    ): object {
        $value = $this->get($parameterName);
        $valueObject = $this->valueToClassTransformer->transform($value);
        if (is_null($valueObject)) {
            throw new InvalidConfigurationParameterException(
                "Configuration parameter `{$parameterName}` contains an incorrect value"
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
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    public function validateAndGetClassListValue(
        string $parameterName,
        string $classInterfaceName,
        bool $nullable = true
    ): array {
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
                    "Configuration parameter `{$parameterName}[{$i}]` contains an incorrect value"
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
     * @param string[] $fileExtensions
     * @throws InvalidConfigurationParameterException
     */
    public function validateAndGetFilePathValue(
        string $parameterName,
        array $fileExtensions,
        bool $nullable = true
    ): ?string {
        $value = $this->validateAndGetStringValue($parameterName, $nullable);
        if (is_null($value)) {
            return null;
        }
        if (!is_file($value)) {
            throw new InvalidConfigurationParameterException(
                "Configuration parameter `{$parameterName}` must contain exists file path"
            );
        }
        if (!preg_match('/(.*)(\.(' . implode('|', $fileExtensions) . '))$/', $value)) {
            throw new InvalidConfigurationParameterException(
                "Configuration parameter `{$parameterName}` must contain path to file with extensions: `" . implode('|', $fileExtensions) . "`"
            );
        }
        return realpath($value);
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function validateAndGetDirectoryPathValue(
        string $parameterName,
        bool $nullable = true
    ): ?string {
        $value = $this->validateAndGetStringValue($parameterName, $nullable);
        if (is_null($value)) {
            return null;
        }
        if (!is_dir($value)) {
            throw new InvalidConfigurationParameterException(
                "Configuration parameter `{$parameterName}` must contain exists dir path"
            );
        }
        return realpath($value);
    }

    /**
     * Configuration arrays are concatenated except when class constructor arguments are passed.
     * In this case they are overwritten.
     */
    private function mergeConfigParams(array $params1, array $params2): array
    {
        foreach ($params2 as $key => $param2Value) {
            if (!array_key_exists($key, $params1)) {
                $params1[$key] = $param2Value;
            } elseif (is_null($param2Value)) {
                continue;
            } elseif (!is_array($params1[$key]) || !is_array($param2Value)) {
                $params1[$key] = $param2Value;
            } elseif (is_associative_array($params1[$key]) && is_associative_array($param2Value)) {
                $params1[$key] = $this->mergeConfigParams($params1[$key], $param2Value);
            } elseif ($key === 'arguments') {
                    $params1[$key] = $param2Value;
            } else {
                $params1[$key] = array_merge($params1[$key], $param2Value);
            }
        }
        return $params1;
    }
}
