<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig\Function;

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
        $customFiltersCollection = new self();
        foreach ($filters as $filter) {
            $customFiltersCollection->add($filter);
        }
        return $customFiltersCollection;
    }

    public function add(CustomFunctionInterface $filter): CustomFunctionsCollection
    {
        $this->customFunctions[$filter::class] = $filter;
        return $this;
    }

    public function get(string $key): ?CustomFunctionInterface
    {
        return $this->customFunctions[$key] ?? null;
    }
}
