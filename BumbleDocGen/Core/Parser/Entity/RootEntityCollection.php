<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity;

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

    abstract public function findEntity(string $search, bool $useUnsafeKeys = true): ?RootEntityInterface;

    /**
     * @param string $rawLink Raw link to an entity or entity element
     * @param string|null $defaultEntityName Entity name to use if the link does not contain a valid or existing entity name,
     *  but only a cursor on an entity element
     * @param bool $useUnsafeKeys
     * @return array
     * @todo return object instead array
     */
    abstract public function gelEntityLinkData(string $rawLink, ?string $defaultEntityName = null, bool $useUnsafeKeys = true): array;
}
