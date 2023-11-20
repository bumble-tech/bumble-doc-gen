<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity;

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
