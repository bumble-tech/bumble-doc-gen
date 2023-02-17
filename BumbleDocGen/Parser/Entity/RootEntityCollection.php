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

    /**
     * @warning The entity obtained as a result of executing this method may not be available for loading
     * @see RootEntityInterface::entityDataCanBeLoaded()
     */
    abstract public function getLoadedOrCreateNew(string $className): RootEntityInterface;
}
