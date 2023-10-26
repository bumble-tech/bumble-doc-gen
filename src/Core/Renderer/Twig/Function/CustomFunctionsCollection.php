<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Renderer\Twig\Function;

final class CustomFunctionsCollection implements \IteratorAggregate
{
    /** @var array<string, CustomFunctionInterface> */
    private array $customFunctions = [];

    public function getIterator(): \Generator
    {
        yield from $this->customFunctions;
    }

    public function getTwigFunctions(): \Generator
    {
        foreach ($this->customFunctions as $filter) {
            if (!is_callable($filter)) {
                continue;
            }
            yield new \Twig\TwigFunction(
                $filter->getName(),
                $filter,
                $filter->getOptions()
            );
        }
    }

    public static function create(CustomFunctionInterface ...$filters): CustomFunctionsCollection
    {
        return (new self())->add(...$filters);
    }

    public function add(CustomFunctionInterface ...$filters): CustomFunctionsCollection
    {
        foreach ($filters as $filter) {
            $this->customFunctions[$filter::class] = $filter;
        }
        return $this;
    }

    public function get(string $key): ?CustomFunctionInterface
    {
        return $this->customFunctions[$key] ?? null;
    }

    public function has(string $key): bool
    {
        return !is_null($this->get($key));
    }

    /**
     * @return array<int, string>
     */
    public function keys(): array
    {
        return array_keys($this->customFunctions);
    }
}
