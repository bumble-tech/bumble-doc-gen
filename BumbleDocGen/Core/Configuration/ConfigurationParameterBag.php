<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Configuration;

use BumbleDocGen\Core\Configuration\ValueResolver\ValueResolverInterface;
use Symfony\Component\Yaml\Yaml;

final class ConfigurationParameterBag
{
    private array $parameters = [];
    /**
     * @var ValueResolverInterface[]
     */
    private array $resolvers = [];

    public function __construct(ValueResolverInterface ...$resolvers)
    {
        $this->resolvers = $resolvers;
    }

    public function loadFromYamlFiles(string ...$fileNames): void
    {
        foreach ($fileNames as $fileName) {
            $parameters = Yaml::parseFile($fileName);
            foreach ($parameters as $name => $value) {
                $this->set($name, $value);
            }
        }
    }

    public function set(string $name, mixed $value): void
    {
        $this->parameters[$name] = $value;
    }

    public function get(string $name): mixed
    {
        if (!isset($this->parameters[$name])) {
            throw new \InvalidArgumentException(sprintf('The parameter "%s" does not exist.', $name));
        }
        $value = $this->parameters[$name];
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
