<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler;

final class LanguageHandlersCollection implements \IteratorAggregate
{
    /** @var array<string, LanguageHandlerInterface> */
    private array $languageHandlers = [];

    public function getIterator(): \Generator
    {
        yield from $this->languageHandlers;
    }

    public static function create(LanguageHandlerInterface ...$languageHandlers): LanguageHandlersCollection
    {
        $languageHandlersCollection = new self();
        foreach ($languageHandlers as $languageHandler) {
            $languageHandlersCollection->add($languageHandler);
        }
        return $languageHandlersCollection;
    }

    public function add(LanguageHandlerInterface $languageHandler): LanguageHandlersCollection
    {
        $this->languageHandlers[$languageHandler::class] = $languageHandler;
        return $this;
    }

    public function get(string $key): ?LanguageHandlerInterface
    {
        return $this->languageHandlers[$key] ?? null;
    }

    /**
     * @return array<int, string>
     */
    public function keys(): array
    {
        return array_keys($this->languageHandlers);
    }
}
