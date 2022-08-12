<?php

declare(strict_types=1);

namespace BumbleDocGen\Plugin;

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
        $pluginsCollection = new self();
        foreach ($plugins as $plugin) {
            $pluginsCollection->add($plugin);
        }
        return $pluginsCollection;
    }

    public function add(PluginInterface $plugin): PluginsCollection
    {
        $this->plugins[$plugin::class] = $plugin;
        return $this;
    }

    public function get(string $key): ?PluginInterface
    {
        return $this->plugins[$key] ?? null;
    }

    public function getOnlyForTemplates(): PluginsCollection
    {
        $pluginsCollection = new PluginsCollection();
        foreach ($this as $plugin) {
            /**@var PluginInterface $plugin */
            if ($plugin instanceof BaseTemplatePluginInterface) {
                $pluginsCollection->add($plugin);
            }
        }
        return $pluginsCollection;
    }

    public function getOnlyForClassEntities(): PluginsCollection
    {
        $pluginsCollection = new PluginsCollection();
        foreach ($this as $plugin) {
            /**@var PluginInterface $plugin */
            if ($plugin instanceof ClassEntityPluginInterface) {
                $pluginsCollection->add($plugin);
            }
        }
        return $pluginsCollection;
    }

    public function getOnlyForSourceLocator(): PluginsCollection
    {
        $pluginsCollection = new PluginsCollection();
        foreach ($this as $plugin) {
            /**@var PluginInterface $plugin */
            if ($plugin instanceof CustomSourceLocatorInterface) {
                $pluginsCollection->add($plugin);
            }
        }
        return $pluginsCollection;
    }
}
