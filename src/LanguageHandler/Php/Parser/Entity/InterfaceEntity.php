<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity;

class InterfaceEntity extends ClassLikeEntity
{
    public function isInterface(): bool
    {
        return true;
    }

    public function isAbstract(): bool
    {
        return true;
    }

    public function getModifiersString(): string
    {
        return 'interface';
    }

    public function getTraitsNames(): array
    {
        return [];
    }
}
