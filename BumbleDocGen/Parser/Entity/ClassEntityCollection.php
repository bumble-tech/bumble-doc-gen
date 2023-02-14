<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\Entity;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Parser\Entity\Cache\CacheableEntityWrapperFactory;
use BumbleDocGen\Parser\Entity\Cache\CacheableEntityWrapperInterface;
use BumbleDocGen\Parser\Entity\Cache\EntityCacheStorageHelper;
use BumbleDocGen\Parser\ParserHelper;
use BumbleDocGen\Plugin\Event\Parser\AfterCreationClassEntityCollection;
use BumbleDocGen\Plugin\Event\Parser\OnAddClassEntityToCollection;
use BumbleDocGen\Plugin\PluginEventDispatcher;
use Psr\Log\LoggerInterface;
use Roave\BetterReflection\Reflector\Reflector;

final class ClassEntityCollection extends BaseEntityCollection
{
    private function __construct(
        private ConfigurationInterface $configuration,
        private Reflector              $reflector,
        private PluginEventDispatcher  $pluginEventDispatcher
    )
    {
    }

    public static function createByReflector(
        ConfigurationInterface $configuration,
        Reflector              $reflector,
        PluginEventDispatcher  $pluginEventDispatcher
    ): ClassEntityCollection
    {
        $classEntityCollection = new ClassEntityCollection(
            $configuration,
            $reflector,
            $pluginEventDispatcher
        );

        foreach ($configuration->getSourceLocators()->getCommonFinder()->files() as $file) {
            $className = ParserHelper::getClassFromFile($file->getPathName());
            if ($className) {
                $relativeFileName = str_replace($configuration->getProjectRoot(), '', $file->getPathName());
                $classEntity = CacheableEntityWrapperFactory::createClassEntity(
                    $configuration,
                    $reflector,
                    ltrim($className, '\\'),
                    $relativeFileName,
                );
                if ($configuration->classEntityFilterCondition($classEntity)->canAddToCollection()) {
                    $classEntityCollection->add($classEntity);
                }
            }
        }
        $pluginEventDispatcher->dispatch(new AfterCreationClassEntityCollection($classEntityCollection));
        return $classEntityCollection;
    }

    public function add(ClassEntity $classEntity, bool $reload = false): ClassEntityCollection
    {
        $key = $classEntity->getObjectId();
        if (!isset($this->entities[$key]) || $reload) {
            $this->getLogger()->info("Parsing {$classEntity->getFileName()} file");
            $this->pluginEventDispatcher->dispatch(new OnAddClassEntityToCollection($classEntity, $this));
            $this->entities[$key] = $classEntity;
        }
        return $this;
    }

    public function addWithoutPreparation(ClassEntity $classEntity): ClassEntityCollection
    {
        $this->entities[$classEntity->getObjectId()] = $classEntity;
        return $this;
    }

    public function get(string $objectId): ?ClassEntity
    {
        $objectId = ltrim(str_replace('\\\\', '\\', $objectId), '\\');
        return $this->entities[$objectId] ?? null;
    }

    public function getLoadedOrCreateNew(string $objectId): ClassEntity
    {
        $classEntity = $this->get($objectId);
        if (!$classEntity) {
            static $loadedUnsafe = [];
            if (isset($loadUnsafe[$objectId])) {
                $loadedUnsafe = $loadUnsafe[$objectId];
            } else {
                $classEntity = CacheableEntityWrapperFactory::createClassEntity(
                    $this->configuration,
                    $this->reflector,
                    ltrim($objectId, '\\'),
                    null,
                );
                $loadedUnsafe[$objectId] = $classEntity;
            }
        }
        return $classEntity;
    }

    public function getEntityByClassName(string $className, bool $createIfNotExists = true): ?ClassEntity
    {
        return $createIfNotExists ? $this->getLoadedOrCreateNew($className) : $this->get($className);
    }

    public function getReflector(): Reflector
    {
        return $this->reflector;
    }

    public function getLogger(): LoggerInterface
    {
        return $this->configuration->getLogger();
    }

    /**
     * @param string[] $interfaces
     */
    public function filterByInterfaces(array $interfaces): ClassEntityCollection
    {
        $classEntityCollection = new ClassEntityCollection(
            $this->configuration, $this->reflector, $this->pluginEventDispatcher
        );
        $interfaces = array_map(
            fn($interface) => ltrim(
                str_replace('\\\\', '\\', $interface),
                '\\'
            ), $interfaces
        );
        foreach ($this as $classEntity) {
            /**@var ClassEntity $classEntity */
            $entityInterfaces = array_map(
                fn($interface) => ltrim($interface, '\\'), $classEntity->getInterfaces()
            );
            if (array_intersect($interfaces, $entityInterfaces)) {
                $classEntityCollection->addWithoutPreparation($classEntity);
            }
        }
        return $classEntityCollection;
    }

    public function filterByParentClassNames(array $parentClassNames): ClassEntityCollection
    {
        $classEntityCollection = new ClassEntityCollection(
            $this->configuration, $this->reflector, $this->pluginEventDispatcher
        );
        $parentClassNames = array_map(
            fn($parentClassName) => ltrim(
                str_replace('\\\\', '\\', $parentClassName),
                '\\'
            ), $parentClassNames
        );
        foreach ($this as $classEntity) {
            /**@var ClassEntity $classEntity */
            $entityParentClassNames = array_map(
                fn($parentClassName) => ltrim($parentClassName, '\\'), $classEntity->getParentClassNames()
            );
            if (array_intersect($parentClassNames, $entityParentClassNames)) {
                $classEntityCollection->addWithoutPreparation($classEntity);
            }
        }
        return $classEntityCollection;
    }

    public function filterByPaths(array $paths): ClassEntityCollection
    {
        $classEntityCollection = new ClassEntityCollection(
            $this->configuration, $this->reflector, $this->pluginEventDispatcher
        );
        foreach ($this as $classEntity) {
            /**@var ClassEntity $classEntity */
            foreach ($paths as $path) {
                if (str_starts_with($classEntity->getFileName(), $path)) {
                    $classEntityCollection->addWithoutPreparation($classEntity);
                }
            }
        }
        return $classEntityCollection;
    }

    public function filterByNameRegularExpression(string $regexPattern): ClassEntityCollection
    {
        $classEntityCollection = new ClassEntityCollection(
            $this->configuration, $this->reflector, $this->pluginEventDispatcher
        );
        foreach ($this as $classEntity) {
            /**@var ClassEntity $classEntity */
            if (preg_match($regexPattern, $classEntity->getShortName())) {
                $classEntityCollection->addWithoutPreparation($classEntity);
            }
        }
        return $classEntityCollection;
    }

    public function getOnlyInstantiable(): ClassEntityCollection
    {
        $classEntityCollection = new ClassEntityCollection(
            $this->configuration, $this->reflector, $this->pluginEventDispatcher
        );
        foreach ($this as $classEntity) {
            /**@var ClassEntity $classEntity */
            if ($classEntity->isInstantiable()) {
                $classEntityCollection->addWithoutPreparation($classEntity);
            }
        }
        return $classEntityCollection;
    }

    public function getOnlyInterfaces(): ClassEntityCollection
    {
        $classEntityCollection = new ClassEntityCollection(
            $this->configuration, $this->reflector, $this->pluginEventDispatcher
        );
        foreach ($this as $classEntity) {
            /**@var ClassEntity $classEntity */
            if ($classEntity->isInterface()) {
                $classEntityCollection->addWithoutPreparation($classEntity);
            }
        }
        return $classEntityCollection;
    }

    public function updateEntitiesCache(): void
    {
        foreach ($this as $classEntity) {
            if (
                is_a($classEntity, CacheableEntityWrapperInterface::class) &&
                $classEntity->entityCacheIsOutdated()
            ) {
                $classEntity->reloadEntityDependenciesCache();
            }
        }
        EntityCacheStorageHelper::saveCache($this->configuration);
    }
}
