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
    public function isTrait(): bool
    {
        return true;
    }

    public function getInterfaceNames(): array
    {
        return [];
    }

    public function getModifiersString(): string
    {
        return 'trait';
    }

    public function isSubclassOf(string $className): bool
    {
        // traits have no parent classes or interfaces
        return false;
    }
}
