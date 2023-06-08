<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity;

use BumbleDocGen\Core\Parser\Entity\Cache\CacheableEntityInterface;
use BumbleDocGen\Core\Parser\Entity\Cache\EntityCacheStorageHelper;
use DI\Attribute\Inject;
use Psr\Cache\InvalidArgumentException;
use Psr\Log\LoggerInterface;

abstract class RootEntityCollection extends BaseEntityCollection
{
    #[Inject] private EntityCacheStorageHelper $entityCacheStorageHelper;
    #[Inject] private LoggerInterface $logger;

    /** @var RootEntityInterface[] */
    protected array $entities = [];

    public function get(string $objectName): ?RootEntityInterface
    {
        return $this->entities[$objectName] ?? null;
    }

    abstract public static function getEntityCollectionName(): string;

    /**
     * @warning The entity obtained as a result of executing this method may not be available for loading
     * @see RootEntityInterface::entityDataCanBeLoaded()
     */
    abstract public function getLoadedOrCreateNew(string $objectName, bool $withAddClassEntityToCollectionEvent = false): RootEntityInterface;

    abstract public function findEntity(string $search, bool $useUnsafeKeys = true): ?RootEntityInterface;

    /**
     * @param string $rawLink Raw link to an entity or entity element
     * @param string|null $defaultEntityName Entity name to use if the link does not contain a valid or existing entity name,
     *  but only a cursor on an entity element
     * @param bool $useUnsafeKeys
     * @return array
     * @todo return object instead array
     */
    abstract public function getEntityLinkData(string $rawLink, ?string $defaultEntityName = null, bool $useUnsafeKeys = true): array;

    /**
     * @throws InvalidArgumentException
     */
    public function updateEntitiesCache(): void
    {
        $needToSaveCache = false;
        foreach ($this->entities as $entity) {
            if (!is_a($entity, CacheableEntityInterface::class)) {
                continue;
            }
            if ($entity->entityDataCanBeLoaded() && $entity->entityCacheIsOutdated()) {
                $this->logger->info("Preparing {$entity->getName()} dependencies cache");
                $entity->reloadEntityDependenciesCache();
            }
            if ($entity->isEntityDataCacheOutdated()) {
                $this->logger->info("Removing {$entity->getName()} not used cache");
                $entity->removeNotUsedEntityDataCache();
                $needToSaveCache = true;
            }
        }
        if ($needToSaveCache) {
            $this->logger->info('Updating local cache storage');
            $this->entityCacheStorageHelper->saveCache();
        }
    }
}
