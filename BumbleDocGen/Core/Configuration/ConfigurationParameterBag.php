<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Configuration;

use BumbleDocGen\Core\Configuration\ValueResolver\ValueResolverInterface;
use InvalidArgumentException;
use Symfony\Component\Yaml\Yaml;

use function BumbleDocGen\Core\is_associative_array;

final class ConfigurationParameterBag
{
    private array $parameters = [];
    /**
     * @var ValueResolverInterface[]
     */
    private array $resolvers = [];

    public function __construct(array $resolvers)
    {
        $this->resolvers = $resolvers;
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
        $configurationParameterBag = new ConfigurationParameterBag(...$this->resolvers);
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
}
