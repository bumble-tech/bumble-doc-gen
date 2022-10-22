<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\Entity;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Parser\AttributeParser;
use BumbleDocGen\Plugin\Event\Parser\AfterCreationClassEntityCollection;
use BumbleDocGen\Plugin\Event\Parser\OnAddClassEntityToCollection;
use BumbleDocGen\Plugin\PluginEventDispatcher;
use Psr\Log\LoggerInterface;
use Roave\BetterReflection\Reflector\Reflector;

final class ClassEntityCollection extends BaseEntityCollection
{
    private function __construct(
        private ConfigurationInterface $configuration,
        private Reflector $reflector,
        private PluginEventDispatcher $pluginEventDispatcher,
        private LoggerInterface $logger
    ) {
    }

    public static function createByReflector(
        ConfigurationInterface $configuration,
        Reflector $reflector,
        AttributeParser $attributeParser,
        PluginEventDispatcher $pluginEventDispatcher
    ): ClassEntityCollection {
        $logger = $configuration->getLogger();
        $classEntityCollection = new ClassEntityCollection($configuration, $reflector, $pluginEventDispatcher, $logger);
        foreach ($reflector->reflectAllClasses() as $classReflection) {
            if (
                str_contains($classReflection->getName(), chr(0)) ||
                str_contains($classReflection->getName(), '@anonymous')
            ) {
                $logger->warning("Skipping `{$classReflection->getName()}`");
                continue;
            }

            $entityClassName = ClassEntity::class;
            if ($classReflection->isEnum()) {
                $entityClassName = EnumEntity::class;
            }
            $classEntity = $entityClassName::create(
                $configuration,
                $reflector,
                $classReflection,
                $attributeParser
            );
            if ($configuration->classEntityFilterCondition($classEntity)->canAddToCollection()) {
                $classEntityCollection->add($classEntity);
            }
        }
        $pluginEventDispatcher->dispatch(new AfterCreationClassEntityCollection($classEntityCollection));
        return $classEntityCollection;
    }

    public function add(ClassEntity $classEntity, bool $reload = false): ClassEntityCollection
    {
        $key = $classEntity->getObjectId();
        if (!isset($this->entities[$key]) || $reload) {
            $this->logger->info("Parsing {$classEntity->getFileName()} file");
            $classEntity->loadClassMembers();
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
        return $this->entities[$objectId] ?? null;
    }

    public function getEntityByClassName(string $className): ?ClassEntity
    {
        $reflection = $this->getReflector()->reflectClass($className);
        $objectId = ClassEntity::generateObjectIdByReflection($reflection);
        return $this->get($objectId);
    }

    public function getReflector(): Reflector
    {
        return $this->reflector;
    }

    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }

    /**
     * @param string[] $interfaces
     */
    public function filterByInterfaces(array $interfaces): ClassEntityCollection
    {
        $classEntityCollection = new ClassEntityCollection(
            $this->configuration, $this->reflector, $this->pluginEventDispatcher, $this->logger
        );
        foreach ($this as $classEntity) {
            /**@var ClassEntity $classEntity */
            if (array_intersect($interfaces, $classEntity->getInterfaces())) {
                $classEntityCollection->addWithoutPreparation($classEntity);
            }
        }
        return $classEntityCollection;
    }

    public function filterByParentClassNames(array $parentClassNames): ClassEntityCollection
    {
        $classEntityCollection = new ClassEntityCollection(
            $this->configuration, $this->reflector, $this->pluginEventDispatcher, $this->logger
        );
        foreach ($this as $classEntity) {
            /**@var ClassEntity $classEntity */
            if (array_intersect($parentClassNames, $classEntity->getParentClassNames())) {
                $classEntityCollection->addWithoutPreparation($classEntity);
            }
        }
        return $classEntityCollection;
    }

    public function filterByPaths(array $paths): ClassEntityCollection
    {
        $classEntityCollection = new ClassEntityCollection(
            $this->configuration, $this->reflector, $this->pluginEventDispatcher, $this->logger
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
            $this->configuration, $this->reflector, $this->pluginEventDispatcher, $this->logger
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
            $this->configuration, $this->reflector, $this->pluginEventDispatcher, $this->logger
        );
        foreach ($this as $classEntity) {
            /**@var ClassEntity $classEntity */
            if ($classEntity->getReflection()->isInstantiable()) {
                $classEntityCollection->addWithoutPreparation($classEntity);
            }
        }
        return $classEntityCollection;
    }

    public function getOnlyInterfaces(): ClassEntityCollection
    {
        $classEntityCollection = new ClassEntityCollection(
            $this->configuration, $this->reflector, $this->pluginEventDispatcher, $this->logger
        );
        foreach ($this as $classEntity) {
            /**@var ClassEntity $classEntity */
            if ($classEntity->getReflection()->isInterface()) {
                $classEntityCollection->addWithoutPreparation($classEntity);
            }
        }
        return $classEntityCollection;
    }
}
