<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity;

/**
 * Trait
 *
 * @see https://www.php.net/manual/en/language.oop5.traits.php
 */
class TraitEntity extends ClassLikeEntity
{
    /**
     * @inheritDoc
     */
    public function isTrait(): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function getInterfaceNames(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function getModifiersString(): string
    {
        return 'trait';
    }

    /**
     * @inheritDoc
     */
    public function isSubclassOf(string $className): bool
    {
        // traits have no parent classes or interfaces
        return false;
    }
}
