<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\Entity;

use BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntityCollection;

abstract class RootEntityCollection extends BaseEntityCollection
{
    /**
     * @var RootEntityInterface[]
     */
    protected array $entities = [];

    public function get(string $objectId): ?RootEntityInterface
    {
        return $this->entities[$objectId] ?? null;
    }
}
