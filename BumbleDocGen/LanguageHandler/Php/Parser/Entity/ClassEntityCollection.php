<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Core\Parser\Entity\RootEntityCollection;
use BumbleDocGen\Core\Plugin\PluginEventDispatcher;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Cache\CacheablePhpEntityFactory;
use BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper;
use BumbleDocGen\LanguageHandler\Php\PhpHandlerSettingsInterface;
use BumbleDocGen\LanguageHandler\Php\Plugin\Event\Parser\AfterCreationClassEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Plugin\Event\Parser\OnAddClassEntityToCollection;
use BumbleDocGen\LanguageHandler\Php\Render\EntityDocRender\EntityDocRenderHelper;
use Psr\Log\LoggerInterface;
use Roave\BetterReflection\Reflector\Reflector;

final class ClassEntityCollection extends RootEntityCollection
{
    private function __construct(
        private ConfigurationInterface        $configuration,
        protected PhpHandlerSettingsInterface $phpHandlerSettings,
        private Reflector                     $reflector,
        private PluginEventDispatcher         $pluginEventDispatcher
    )
    {
    }

    public function getPluginEventDispatcher(): PluginEventDispatcher
    {
        return $this->pluginEventDispatcher;
    }

    public static function getEntityCollectionName(): string
    {
        return 'phpClassEntityCollection';
    }

    public static function createByReflector(
        ConfigurationInterface      $configuration,
        PhpHandlerSettingsInterface $phpHandlerSettings,
        Reflector                   $reflector,
        PluginEventDispatcher       $pluginEventDispatcher
    ): ClassEntityCollection
    {
        $classEntityCollection = new ClassEntityCollection(
            $configuration,
            $phpHandlerSettings,
            $reflector,
            $pluginEventDispatcher
        );

        foreach ($configuration->getSourceLocators()->getCommonFinder()->files() as $file) {
            $className = ParserHelper::getClassFromFile($file->getPathName());
            if ($className) {
                $relativeFileName = str_replace($configuration->getProjectRoot(), '', $file->getPathName());
                $classEntity = CacheablePhpEntityFactory::createClassEntity(
                    $configuration,
                    $phpHandlerSettings,
                    $reflector,
                    $classEntityCollection,
                    ltrim($className, '\\'),
                    $relativeFileName,
                );
                if ($phpHandlerSettings->classEntityFilterCondition($classEntity)->canAddToCollection()) {
                    $classEntityCollection->add($classEntity);
                }
            }
        }
        $pluginEventDispatcher->dispatch(new AfterCreationClassEntityCollection($classEntityCollection));
        return $classEntityCollection;
    }

    public function getConfiguration(): ConfigurationInterface
    {
        return $this->configuration;
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
                $classEntity = CacheablePhpEntityFactory::createClassEntity(
                    $this->configuration,
                    $this->phpHandlerSettings,
                    $this->reflector,
                    $this,
                    ltrim($objectId, '\\'),
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
            $this->configuration, $this->phpHandlerSettings, $this->reflector, $this->pluginEventDispatcher
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
            $this->configuration, $this->phpHandlerSettings, $this->reflector, $this->pluginEventDispatcher
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
            $this->configuration, $this->phpHandlerSettings, $this->reflector, $this->pluginEventDispatcher
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
            $this->configuration, $this->phpHandlerSettings, $this->reflector, $this->pluginEventDispatcher
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
            $this->configuration, $this->phpHandlerSettings, $this->reflector, $this->pluginEventDispatcher
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
            $this->configuration, $this->phpHandlerSettings, $this->reflector, $this->pluginEventDispatcher
        );
        foreach ($this as $classEntity) {
            /**@var ClassEntity $classEntity */
            if ($classEntity->isInterface()) {
                $classEntityCollection->addWithoutPreparation($classEntity);
            }
        }
        return $classEntityCollection;
    }

    /**
     * @param string $search
     *  Search query. For the search, only the main part is taken, up to the characters: `::`, `->`, `#`.
     *  If the request refers to multiple existing entities and if unsafe keys are allowed,
     *  a warning will be shown and the first entity found will be used.
     *
     * @param bool $useUnsafeKeys Whether to use search keys that can be used to find several entities
     *
     * @return ClassEntity|null
     *
     * @example
     *  $classEntityCollection->findEntity('App'); // class name
     *  $classEntityCollection->findEntity('SelfDoc\Console\App'); // class with namespace
     *  $classEntityCollection->findEntity('\SelfDoc\Console\App'); // class with namespace
     *  $classEntityCollection->findEntity('\SelfDoc\Console\App::test()'); // class with namespace and optional part
     *  $classEntityCollection->findEntity('App.php'); // filename
     *  $classEntityCollection->findEntity('/SelfDoc/Console/App.php'); // relative path
     *  $classEntityCollection->findEntity('/Users/someuser/Desktop/projects/bumble-doc-gen/SelfDoc/Console/App.php'); // absolute path
     *  $classEntityCollection->findEntity('https://***REMOVED***/blob/master/SelfDoc/Console/App.php'); // source link
     */
    public function findEntity(string $search, bool $useUnsafeKeys = true): ?ClassEntity
    {
        static $index = [];
        static $duplicates = [];
        static $lastCacheKey = null;

        if (preg_match('/^((self|parent):|(\$(.*)->))/', $search)) {
            return null;
        }

        $lastKey = array_key_last($this->entities);
        if ($lastKey !== $lastCacheKey || !$index) {
            $lastCacheKey = $lastKey;
            $index = [];
            $duplicates = [];
            foreach ($this->entities as $entity) {
                $index[$entity->getName()] = $entity;
                if ($entity->getFileName() && $entity->entityDataCanBeLoaded()) {
                    $index[$entity->getFileName()] = $entity;
                    $index[$entity->getAbsoluteFileName()] = $entity;
                    $index[$entity->getFileSourceLink(false)] = $entity;

                    $shortFileName = array_reverse(explode('/', $entity->getFileName()))[0];
                    if (!isset($index[$shortFileName])) {
                        $index[$shortFileName] = $entity;
                    } else {
                        $duplicates[$shortFileName] = $entity->getShortName();
                    }
                }

                if (!isset($index[$entity->getShortName()])) {
                    $index[$entity->getShortName()] = $entity;
                } else {
                    $duplicates[$entity->getShortName()] = $entity->getShortName();
                }
            }
        }

        $entity = null;
        $foundKey = null;
        if (array_key_exists($search, $index)) {
            $entity = $index[$search];
            $foundKey = $search;
        } else {
            $preparedSearch = preg_replace('/^(((http(s?))::)?([^-:]+))((::|->)(.*))/', '$1', $search);
            if (array_key_exists($preparedSearch, $index)) {
                $entity = $index[$preparedSearch];
                $foundKey = $preparedSearch;
            } elseif (
                preg_match('/^(\/?)(([a-zA-Z_])([a-zA-Z_0-9\/]+))((::|->))?/', $preparedSearch, $matches) &&
                isset($index[$matches[2]])
            ) {
                $entity = $index[$matches[2]];
                $foundKey = $matches[2];
            }
        }

        if (array_key_exists($foundKey, $duplicates)) {
            if ($useUnsafeKeys) {
                $this->configuration->getLogger()->warning(
                    "ClassEntityCollection:findEntity: Key `{$foundKey}` refers to multiple entities. Use a unique search key to avoid mistakes"
                );
            } else {
                return null;
            }
        }

        return $entity;
    }

    /**
     * @inheritDoc
     */
    public function gelEntityLinkData(
        string  $rawLink,
        ?string $defaultEntityName = null,
        bool    $useUnsafeKeys = true
    ): array
    {
        return EntityDocRenderHelper::getEntityDataByLink(
            $rawLink,
            $this,
            $defaultEntityName,
            $useUnsafeKeys
        );
    }
}
