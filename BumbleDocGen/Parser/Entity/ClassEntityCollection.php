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
        private Reflector              $reflector,
        private PluginEventDispatcher  $pluginEventDispatcher,
        private LoggerInterface        $logger
    )
    {
    }

    public static function getClassFromFile($file): ?string
    {
        if (str_ends_with($file, '.php')) {
            $content = file_get_contents($file);
            $namespaceLevel = false;
            $classLevel = false;
            $namespace = '';
            foreach (token_get_all($content, TOKEN_PARSE) as $token) {
                if ($token[0] === T_NAMESPACE) {
                    $namespaceLevel = true;
                } elseif ($namespaceLevel && in_array($token[0], [T_NAME_QUALIFIED, T_STRING])) {
                    $namespaceLevel = false;
                    $namespace = $token[1];
                }
                if (!$namespaceLevel && in_array($token[0], [T_CLASS, T_INTERFACE, T_TRAIT])) {
                    $classLevel = true;
                } elseif (!$namespaceLevel && $classLevel && $token[0] === T_STRING) {
                    return $namespace . '\\' . $token[1];
                }
            }
        }
        return null;
    }

    public static function createByReflector(
        ConfigurationInterface $configuration,
        Reflector              $reflector,
        AttributeParser        $attributeParser,
        PluginEventDispatcher  $pluginEventDispatcher
    ): ClassEntityCollection
    {
        $logger = $configuration->getLogger();
        $classEntityCollection = new ClassEntityCollection($configuration, $reflector, $pluginEventDispatcher, $logger);

        foreach ($configuration->getSourceLocators()->getCommonFinder()->files() as $file) {
            $className = self::getClassFromFile($file->getPathName());
            if ($className) {
                $classReflection = $reflector->reflectClass($className);

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
        }
        $pluginEventDispatcher->dispatch(new AfterCreationClassEntityCollection($classEntityCollection));
        return $classEntityCollection;
    }

    public function add(ClassEntity $classEntity, bool $reload = false): ClassEntityCollection
    {
        $key = $classEntity->getObjectId();
        if (!isset($this->entities[$key]) || $reload) {
            $this->logger->info("Parsing {$classEntity->getFileName()} file");
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
