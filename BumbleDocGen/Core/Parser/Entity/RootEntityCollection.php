<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity;

use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Parser\Entity\Cache\CacheableEntityWrapperInterface;
use BumbleDocGen\Core\Parser\Entity\Cache\EntityCacheStorageHelper;

abstract class RootEntityCollection extends BaseEntityCollection
{
    /**
     * @var RootEntityInterface[]
     */
    protected array $entities = [];

    public function get(string $objectName): ?RootEntityInterface
    {
        return $this->entities[$objectName] ?? null;
    }

    abstract public static function getEntityCollectionName(): string;

    abstract public function getConfiguration(): Configuration;

    /**
     * @warning The entity obtained as a result of executing this method may not be available for loading
     * @see RootEntityInterface::entityDataCanBeLoaded()
     */
    abstract public function getLoadedOrCreateNew(string $objectName): RootEntityInterface;

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

    public function updateEntitiesCache(): void
    {
        foreach ($this as $entity) {
            if (
                is_a($entity, CacheableEntityWrapperInterface::class) &&
                $entity->entityCacheIsOutdated()
            ) {
                $entity->reloadEntityDependenciesCache();
            }
        }
        EntityCacheStorageHelper::saveCache($this->getConfiguration());
    }
}
