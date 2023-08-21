<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Plugin;

final class PluginsCollection implements \IteratorAggregate
{
    /** @var array<int, PluginInterface> */
    private array $plugins = [];

    public function getIterator(): \Generator
    {
        yield from $this->plugins;
    }

    public static function create(PluginInterface ...$plugins): PluginsCollection
    {
        return (new self())->add(...$plugins);
    }

    public function add(PluginInterface ...$plugins): PluginsCollection
    {
        foreach ($plugins as $plugin) {
            $this->plugins[$plugin::class] = $plugin;
        }
        return $this;
    }

    public function get(string $key): ?PluginInterface
    {
        return $this->plugins[$key] ?? null;
    }
}
