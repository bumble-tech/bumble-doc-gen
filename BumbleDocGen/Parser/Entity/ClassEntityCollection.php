<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\Entity;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Parser\AttributeParser;
use BumbleDocGen\Plugin\ClassEntityCollectionPluginInterface;
use BumbleDocGen\Plugin\ClassEntityPluginInterface;
use Psr\Log\LoggerInterface;
use Roave\BetterReflection\Reflector\Reflector;

final class ClassEntityCollection extends BaseEntityCollection
{
    private function __construct(
        private ConfigurationInterface $configuration,
        private Reflector $reflector,
        private LoggerInterface $logger
    ) {
    }

    public static function createByReflector(
        ConfigurationInterface $configuration,
        Reflector $reflector,
        AttributeParser $attributeParser
    ): ClassEntityCollection {
        $logger = $configuration->getLogger();
        $classEntityCollection = new ClassEntityCollection($configuration, $reflector, $logger);
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
        /** @var ClassEntityCollectionPluginInterface[] $plugins */
        $plugins = $configuration->getPlugins()->filterByInterface(ClassEntityCollectionPluginInterface::class);
        foreach ($plugins as $plugin) {
            $plugin->afterCreationClassEntityCollection($classEntityCollection);
        }
        return $classEntityCollection;
    }

    public function add(ClassEntity $classEntity, bool $reload = false): ClassEntityCollection
    {
        $key = $classEntity->getObjectId();
        if (!isset($this->entities[$key]) || $reload) {
            $this->logger->info("Parsing {$classEntity->getFileName()} file");
            $classEntity->loadClassMembers();
            /**@var ClassEntityPluginInterface[] $plugins */
            $plugins = $this->configuration->getPlugins()->filterByInterface(ClassEntityPluginInterface::class);
            foreach ($plugins as $plugin) {
                $classEntity = $plugin->beforeAddingClassEntity($classEntity, $this);
            }
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
        $classEntityCollection = new ClassEntityCollection($this->configuration, $this->reflector, $this->logger);
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
        $classEntityCollection = new ClassEntityCollection($this->configuration, $this->reflector, $this->logger);
        foreach ($this as $classEntity) {
            /**@var ClassEntity $classEntity */
            if (array_intersect($parentClassNames, iterator_to_array($classEntity->getParentClassNames()))) {
                $classEntityCollection->addWithoutPreparation($classEntity);
            }
        }
        return $classEntityCollection;
    }

    public function filterByPaths(array $paths): ClassEntityCollection
    {
        $classEntityCollection = new ClassEntityCollection($this->configuration, $this->reflector, $this->logger);
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
        $classEntityCollection = new ClassEntityCollection($this->configuration, $this->reflector, $this->logger);
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
        $classEntityCollection = new ClassEntityCollection($this->configuration, $this->reflector, $this->logger);
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
        $classEntityCollection = new ClassEntityCollection($this->configuration, $this->reflector, $this->logger);
        foreach ($this as $classEntity) {
            /**@var ClassEntity $classEntity */
            if ($classEntity->getReflection()->isInterface()) {
                $classEntityCollection->addWithoutPreparation($classEntity);
            }
        }
        return $classEntityCollection;
    }
}
