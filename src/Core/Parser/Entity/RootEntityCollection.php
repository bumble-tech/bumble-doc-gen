<?php

declare(strict_types=1);

namespace BumbleDocGen\Core\Parser\Entity;

use BumbleDocGen\Core\Parser\Entity\Cache\CacheableEntityInterface;
use BumbleDocGen\Core\Parser\Entity\Cache\EntityCacheStorageHelper;
use BumbleDocGen\Core\Parser\FilterCondition\ConditionInterface;
use BumbleDocGen\Core\Parser\SourceLocator\SourceLocatorsCollection;
use DI\Attribute\Inject;
use Psr\Cache\InvalidArgumentException;
use Psr\Log\LoggerInterface;

/**
 * @template T
 */
abstract class RootEntityCollection extends BaseEntityCollection
{
    #[Inject] private EntityCacheStorageHelper $entityCacheStorageHelper;
    #[Inject] private LoggerInterface $logger;

    /** @var RootEntityInterface[] */
    protected array $entities = [];

    abstract public function loadEntitiesByConfiguration(?EntitiesLoaderProgressBarInterface $progressBar = null): CollectionLoadEntitiesResult;

    abstract public function loadEntities(
        SourceLocatorsCollection $sourceLocatorsCollection,
        ?ConditionInterface $filters = null,
        ?EntitiesLoaderProgressBarInterface $progressBar = null
    ): CollectionLoadEntitiesResult;

    /**
     * Get collection name
     *
     * @api
     */
    abstract public function getEntityCollectionName(): string;

    /**
     * Get an entity from a collection (only previously added)
     *
     * @param class-string<T> $objectName
     * @return null|T
     *
     * @api
     */
    public function get(string $objectName): ?RootEntityInterface
    {
        return $this->entities[$objectName] ?? null;
    }

    /**
     * Get an entity from the collection or create a new one if it has not yet been added
     *
     * @warning The entity obtained as a result of executing this method may not be available for loading
     *
     * @see RootEntityInterface::isEntityDataCanBeLoaded()
     *
     * @param class-string<T> $objectName
     *
     * @return T
     *
     * @api
     */
    abstract public function getLoadedOrCreateNew(string $objectName, bool $withAddClassEntityToCollectionEvent = false): RootEntityInterface;

    /**
     * Find an entity in a collection
     *
     * @return null|T
     *
     * @api
     */
    abstract public function findEntity(string $search, bool $useUnsafeKeys = true): ?RootEntityInterface;

    /**
     * @param string $rawLink Raw link to an entity or entity element
     * @param string|null $defaultEntityName Entity name to use if the link does not contain a valid or existing entity name,
     *  but only a cursor on an entity element
     * @param bool $useUnsafeKeys
     *
     * @return array
     *
     * @internal
     *
     * @todo return object instead array
     */
    abstract public function getEntityLinkData(string $rawLink, ?string $defaultEntityName = null, bool $useUnsafeKeys = true): array;

    /**
     * @internal
     *
     * @throws InvalidArgumentException
     */
    public function updateEntitiesCache(): void
    {
        $needToSaveCache = false;
        foreach ($this->entities as $entity) {
            if (!is_a($entity, CacheableEntityInterface::class)) {
                continue;
            }
            if ($entity->isEntityDataCanBeLoaded() && $entity->isEntityCacheOutdated()) {
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

    /**
     * Convert collection to array
     *
     * @return RootEntityInterface[]
     *
     * @api
     */
    public function toArray(): array
    {
        return $this->entities;
    }
}
