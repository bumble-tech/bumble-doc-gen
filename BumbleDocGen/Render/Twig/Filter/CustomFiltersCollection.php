<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig\Filter;

final class CustomFiltersCollection implements \IteratorAggregate
{
    /** @var array<string, CustomFilterInterface> */
    private array $customFilters = [];

    public function getIterator(): \Generator
    {
        yield from $this->customFilters;
    }

    public function getTwigFilters(): \Generator
    {
        foreach ($this->customFilters as $filter) {
            if (!is_callable($filter)) {
                continue;
            }
            yield new \Twig\TwigFilter(
                $filter->getName(),
                $filter,
                $filter->getOptions()
            );
        }
    }

    public static function create(CustomFilterInterface ...$filters): CustomFiltersCollection
    {
        return (new self())->add(...$filters);
    }

    public function add(CustomFilterInterface ...$filters): CustomFiltersCollection
    {
        foreach ($filters as $filter) {
            $this->customFilters[$filter::class] = $filter;
        }
        return $this;
    }

    public function get(string $key): ?CustomFilterInterface
    {
        return $this->customFilters[$key] ?? null;
    }
}
