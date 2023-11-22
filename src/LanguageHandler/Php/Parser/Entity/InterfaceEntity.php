<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity;

/**
 * Object interface
 *
 * @see https://www.php.net/manual/en/language.oop5.interfaces.php
 */
class InterfaceEntity extends ClassLikeEntity
{
    /**
     * @inheritDoc
     */
    public function isInterface(): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function isAbstract(): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function getModifiersString(): string
    {
        return 'interface';
    }

    /**
     * @inheritDoc
     */
    public function getTraitsNames(): array
    {
        return [];
    }
}
