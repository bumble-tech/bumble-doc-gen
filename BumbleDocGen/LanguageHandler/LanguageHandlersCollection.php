<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler;

use BumbleDocGen\Plugin\PluginsCollection;

final class LanguageHandlersCollection implements \IteratorAggregate
{
    /** @var array<int, LanguageHandlerInterface> */
    private array $languageHandlers = [];

    public function getIterator(): \Generator
    {
        yield from $this->languageHandlers;
    }

    public static function create(LanguageHandlerInterface ...$plugins): LanguageHandlersCollection
    {
        $languageHandlersCollection = new self();
        foreach ($plugins as $plugin) {
            $languageHandlersCollection->add($plugin);
        }
        return $languageHandlersCollection;
    }

    public function add(LanguageHandlerInterface $plugin): LanguageHandlersCollection
    {
        $this->languageHandlers[$plugin::class] = $plugin;
        return $this;
    }

    public function get(string $key): ?LanguageHandlerInterface
    {
        return $this->languageHandlers[$key] ?? null;
    }

    public function getAllExtraPlugins(): PluginsCollection
    {
        $plugins = PluginsCollection::create();
        foreach ($this->languageHandlers as $languageHandler) {
            foreach ($languageHandler->getExtraPlugins() as $plugin) {
                $plugins->add($plugin);
            }
        }
        return $plugins;
    }
}
