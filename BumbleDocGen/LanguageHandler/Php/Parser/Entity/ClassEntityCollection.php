<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity;

use BumbleDocGen\Core\Cache\LocalCache\Exception\ObjectNotFoundException;
use BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache;
use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Console\ProgressBarFactory;
use BumbleDocGen\Core\Parser\Entity\LoggableRootEntityCollection;
use BumbleDocGen\Core\Plugin\PluginEventDispatcher;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Cache\CacheablePhpEntityFactory;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException;
use BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper;
use BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings;
use BumbleDocGen\LanguageHandler\Php\Plugin\Event\Parser\AfterLoadingClassEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Plugin\Event\Parser\OnAddClassEntityToCollection;
use BumbleDocGen\LanguageHandler\Php\Renderer\EntityDocRenderer\EntityDocRendererHelper;
use DI\DependencyException;
use DI\NotFoundException;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Style\OutputStyle;

final class ClassEntityCollection extends LoggableRootEntityCollection
{
    private array $entitiesNotHandledByPlugins = [];

    public function __construct(
        private Configuration             $configuration,
        private PhpHandlerSettings        $phpHandlerSettings,
        private ParserHelper              $parserHelper,
        private PluginEventDispatcher     $pluginEventDispatcher,
        private CacheablePhpEntityFactory $cacheablePhpEntityFactory,
        private EntityDocRendererHelper   $docRendererHelper,
        private LocalObjectCache          $localObjectCache,
        private ProgressBarFactory        $progressBarFactory,
        private OutputStyle               $io,
        private LoggerInterface           $logger
    )
    {
        parent::__construct();
    }

    public function getPluginEventDispatcher(): PluginEventDispatcher
    {
        return $this->pluginEventDispatcher;
    }

    public static function getEntityCollectionName(): string
    {
        return 'phpClassEntityCollection';
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    public function loadClassEntities(): void
    {
        $pb = $this->progressBarFactory->createStylizedProgressBar();
        $pb->setName('Loading PHP entities');
        $classEntityFilter = $this->phpHandlerSettings->getClassEntityFilter();

        $allFiles = iterator_to_array($this->configuration->getSourceLocators()->getCommonFinder()->files());
        $addedFilesCount = 0;
        foreach ($pb->iterate($allFiles) as $file) {
            $pathName = $file->getPathName();
            $relativeFileName = str_replace($this->configuration->getProjectRoot(), '', $pathName);
            $pb->setStepDescription("Processing `{$relativeFileName}` file");
            $className = $this->parserHelper->getClassFromFile($pathName);
            if ($className) {
                $relativeFileName = str_replace($this->configuration->getProjectRoot(), '', $file->getPathName());
                $classEntity = $this->cacheablePhpEntityFactory->createClassEntity(
                    $this,
                    ltrim($className, '\\'),
                    $relativeFileName
                );
                if ($classEntityFilter->canAddToCollection($classEntity)) {
                    $this->add($classEntity);
                    ++$addedFilesCount;
                }
            }
        }
        $this->pluginEventDispatcher->dispatch(new AfterLoadingClassEntityCollection($this));

        $allFilesCount = count($allFiles);
        $skipped = $allFilesCount - $addedFilesCount;
        $totalAddedEntities = count($this->entities);
        $addedByPlugins = $totalAddedEntities - $addedFilesCount;

        $this->io->table([], [
            ['Processed files:', "<options=bold,underscore>{$addedFilesCount}</>"],
            ['Skipped files:', "<options=bold,underscore>{$skipped}</>"],
            ['Entities added by plugins:', "<options=bold,underscore>{$addedByPlugins}</>"],
            ['Total added entities:', "<options=bold,underscore>{$totalAddedEntities}</>"],
        ]);
    }

    /**
     * @throws InvalidConfigurationParameterException
     * @throws Exception\ReflectionException
     */
    public function add(ClassEntity $classEntity, bool $reload = false): ClassEntityCollection
    {
        $className = $classEntity->getName();
        if (!isset($this->entities[$className]) || $reload || isset($this->entitiesNotHandledByPlugins[$className])) {
            $this->logger->info("Parsing {$classEntity->getFileName()} file");
            $this->pluginEventDispatcher->dispatch(new OnAddClassEntityToCollection($classEntity, $this));
            $this->entities[$className] = $classEntity;
            unset($this->entitiesNotHandledByPlugins[$className]);
        }
        return $this;
    }

    protected function prepareObjectName(string $objectName): string
    {
        return ltrim(str_replace('\\\\', '\\', $objectName), '\\');
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function _getLoadedOrCreateNew(string $objectName, bool $withAddClassEntityToCollectionEvent = false): ClassEntity
    {
        $classEntity = $this->get($objectName);
        if (!$classEntity) {
            $objectName = ltrim($objectName, '\\');
            $classEntity = $this->cacheablePhpEntityFactory->createClassEntity(
                $this,
                $objectName
            );
            $this->entities[$classEntity->getName()] = $classEntity;
        }

        if ($withAddClassEntityToCollectionEvent && array_key_exists($objectName, $this->entitiesNotHandledByPlugins)) {
            $this->pluginEventDispatcher->dispatch(new OnAddClassEntityToCollection($classEntity, $this));
            unset($this->entitiesNotHandledByPlugins[$objectName]);
        } else {
            $this->entitiesNotHandledByPlugins[$objectName] = $objectName;
        }

        return $classEntity;
    }

    public function getEntityByClassName(string $className, bool $createIfNotExists = true): ?ClassEntity
    {
        return $createIfNotExists ? $this->getLoadedOrCreateNew($className) : $this->get($className);
    }

    /**
     * @param string[] $interfaces
     *
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    public function filterByInterfaces(array $interfaces): ClassEntityCollection
    {
        $classEntityCollection = $this->cloneForFiltration();
        $interfaces = array_map(
            fn($interface) => ltrim(
                str_replace('\\\\', '\\', $interface),
                '\\'
            ), $interfaces
        );
        foreach ($classEntityCollection as $objectId => $classEntity) {
            /**@var ClassEntity $classEntity */
            $entityInterfaces = array_map(
                fn($interface) => ltrim($interface, '\\'), $classEntity->getInterfaceNames()
            );
            if (!array_intersect($interfaces, $entityInterfaces)) {
                $classEntityCollection->remove($objectId);
            }
        }
        return $classEntityCollection;
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    public function filterByParentClassNames(array $parentClassNames): ClassEntityCollection
    {
        $classEntityCollection = $this->cloneForFiltration();
        $parentClassNames = array_map(
            fn($parentClassName) => ltrim(
                str_replace('\\\\', '\\', $parentClassName),
                '\\'
            ), $parentClassNames
        );
        foreach ($classEntityCollection as $objectId => $classEntity) {
            /**@var ClassEntity $classEntity */
            $entityParentClassNames = array_map(
                fn($parentClassName) => ltrim($parentClassName, '\\'), $classEntity->getParentClassNames()
            );
            if (!array_intersect($parentClassNames, $entityParentClassNames)) {
                $classEntityCollection->remove($objectId);
            }
        }
        return $classEntityCollection;
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    public function filterByPaths(array $paths): ClassEntityCollection
    {
        $classEntityCollection = $this->cloneForFiltration();
        foreach ($classEntityCollection as $objectId => $classEntity) {
            $needToKeep = false;
            /**@var ClassEntity $classEntity */
            foreach ($paths as $path) {
                if (str_starts_with($classEntity->getFileName(), $path)) {
                    $needToKeep = true;
                }
            }
            if (!$needToKeep) {
                $classEntityCollection->remove($objectId);
            }
        }
        return $classEntityCollection;
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    public function filterByNameRegularExpression(string $regexPattern): ClassEntityCollection
    {
        $classEntityCollection = $this->cloneForFiltration();
        foreach ($classEntityCollection as $objectId => $classEntity) {
            /**@var ClassEntity $classEntity */
            if (!preg_match($regexPattern, $classEntity->getShortName())) {
                $classEntityCollection->remove($objectId);
            }
        }
        return $classEntityCollection;
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    public function getOnlyInstantiable(): ClassEntityCollection
    {
        $classEntityCollection = $this->cloneForFiltration();
        foreach ($classEntityCollection as $objectId => $classEntity) {
            /**@var ClassEntity $classEntity */
            if (!$classEntity->isInstantiable()) {
                $classEntityCollection->remove($objectId);
            }
        }
        return $classEntityCollection;
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    public function getOnlyInterfaces(): ClassEntityCollection
    {
        $classEntityCollection = $this->cloneForFiltration();
        foreach ($classEntityCollection as $objectId => $classEntity) {
            /**@var ClassEntity $classEntity */
            if (!$classEntity->isInterface()) {
                $classEntityCollection->remove($objectId);
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
    public function _findEntity(string $search, bool $useUnsafeKeys = true): ?ClassEntity
    {
        if (preg_match('/^((self|parent):|(\$(.*)->))/', $search)) {
            return null;
        }

        $cacheData = [];
        try {
            $cacheData = $this->localObjectCache->getMethodCachedResult(__METHOD__, '');
        } catch (ObjectNotFoundException) {
        }
        $index = $cacheData['index'] ?? [];
        $duplicates = $cacheData['duplicates'] ?? [];
        $lastCacheKey = $cacheData['lastCacheKey'] ?? null;

        $lastKey = array_key_last($this->entities);
        if ($lastKey !== $lastCacheKey || !$index) {
            $lastCacheKey = $lastKey;
            $index = [];
            $duplicates = [];
            foreach ($this->entities as $entity) {
                $index[$entity->getName()] = $entity;
                if ($entity->entityDataCanBeLoaded() && $entity->getFileName()) {
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
            $this->localObjectCache->cacheMethodResult(__METHOD__, '', [
                'index' => $index,
                'duplicates' => $duplicates,
                'lastCacheKey' => $lastCacheKey,
            ]);
        }

        $entity = null;
        $foundKey = null;
        $search = ltrim($search, '\\');
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
                $this->logger->warning(
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
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    public function getEntityLinkData(
        string  $rawLink,
        ?string $defaultEntityName = null,
        bool    $useUnsafeKeys = true
    ): array
    {
        return $this->docRendererHelper->getEntityDataByLink(
            $rawLink,
            $this,
            $defaultEntityName,
            $useUnsafeKeys
        );
    }
}
