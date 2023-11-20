<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity;

use BumbleDocGen\Console\ProgressBar\ProgressBarFactory;
use BumbleDocGen\Core\Cache\LocalCache\Exception\ObjectNotFoundException;
use BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache;
use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\LoggableRootEntityCollection;
use BumbleDocGen\Core\Parser\Entity\RootEntityInterface;
use BumbleDocGen\Core\Plugin\PluginEventDispatcher;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Cache\CacheablePhpEntityFactory;
use BumbleDocGen\LanguageHandler\Php\Parser\PhpParser\PhpParserHelper;
use BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings;
use BumbleDocGen\LanguageHandler\Php\Plugin\Event\Parser\AfterLoadingClassEntityCollection;
use BumbleDocGen\LanguageHandler\Php\Plugin\Event\Parser\OnAddClassEntityToCollection;
use BumbleDocGen\LanguageHandler\Php\Renderer\EntityDocRenderer\EntityDocRendererHelper;
use DI\DependencyException;
use DI\NotFoundException;
use PhpParser\Node\Stmt\Class_ as ClassNode;
use PhpParser\Node\Stmt\Enum_ as EnumNode;
use PhpParser\Node\Stmt\Interface_ as InterfaceNode;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\Node\Stmt\Trait_ as TraitNode;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitor\NameResolver;
use Psr\Cache\InvalidArgumentException;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Style\OutputStyle;

/**
 * Collection of php root entities
 */
final class PhpEntitiesCollection extends LoggableRootEntityCollection
{
    private const PHP_FILE_TEMPLATE = '/\.php$/';
    public const NAME = 'phpEntities';

    private array $entitiesNotHandledByPlugins = [];

    public function __construct(
        private Configuration $configuration,
        private PhpHandlerSettings $phpHandlerSettings,
        private PluginEventDispatcher $pluginEventDispatcher,
        private CacheablePhpEntityFactory $cacheablePhpEntityFactory,
        private EntityDocRendererHelper $docRendererHelper,
        private PhpParserHelper $phpParserHelper,
        private LocalObjectCache $localObjectCache,
        private ProgressBarFactory $progressBarFactory,
        private OutputStyle $io,
        private LoggerInterface $logger,
    ) {
        parent::__construct();
    }

    public function getPluginEventDispatcher(): PluginEventDispatcher
    {
        return $this->pluginEventDispatcher;
    }

    public function getEntityCollectionName(): string
    {
        return self::NAME;
    }

    /**
     * @throws InvalidArgumentException
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public function loadClassEntities(): void
    {
        $pb = $this->progressBarFactory->createStylizedProgressBar();
        $pb->setName('Loading PHP entities');
        $classEntityFilter = $this->phpHandlerSettings->getClassEntityFilter();

        $allFiles = iterator_to_array(
            $this->configuration
                ->getSourceLocators()
                ->getCommonFinder()
                ->files()
        );
        $addedFilesCount = 0;

        $nodeTraverser = new NodeTraverser();
        $nodeTraverser->addVisitor(new NameResolver());
        $phpParser = $this->phpParserHelper->phpParser();

        foreach ($pb->iterate($allFiles) as $file) {
            if (!preg_match(self::PHP_FILE_TEMPLATE, $file->getPathName())) {
                continue;
            }
            $pathName = $file->getPathName();
            try {
                $nodes = $phpParser->parse(file_get_contents($pathName));
            } catch (\Exception $e) {
                $this->logger->warning("File `{$pathName}` parsing error: {$e->getMessage()}");
                continue;
            }
            $nodes = $nodeTraverser->traverse($nodes);
            $relativeFileName = str_replace($this->configuration->getProjectRoot(), '', $pathName);
            $pb->setStepDescription("Processing `{$relativeFileName}` file");
            foreach ($nodes as $node) {
                if (!$node instanceof Namespace_) {
                    continue;
                }
                $namespaceName = $node->name->toString();
                foreach ($node->stmts as $subNode) {
                    if (!in_array(get_class($subNode), [ClassNode::class, InterfaceNode::class, TraitNode::class, EnumNode::class])) {
                        continue;
                    }
                    $className = $subNode->name->toString();
                    $classEntity = $this->cacheablePhpEntityFactory->createClassLikeEntity(
                        $this,
                        "{$namespaceName}\\{$className}",
                        $relativeFileName
                    );

                    if ($classEntity->entityCacheIsOutdated()) {
                        $classEntity->setCustomAst($subNode);
                    }

                    if ($classEntityFilter->canAddToCollection($classEntity)) {
                        $this->add($classEntity);
                        ++$addedFilesCount;
                    }
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
     */
    public function add(ClassLikeEntity $classEntity, bool $reload = false): PhpEntitiesCollection
    {
        $className = $classEntity->getName();
        if (!isset($this->entities[$className]) || $reload || isset($this->entitiesNotHandledByPlugins[$className])) {
            $this->logger->info("Parsing {$classEntity->getRelativeFileName()} file");
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
     * @throws InvalidConfigurationParameterException
     */
    public function internalGetLoadedOrCreateNew(string $objectName, bool $withAddClassEntityToCollectionEvent = false): ClassLikeEntity
    {
        $classEntity = $this->get($objectName);
        if (!$classEntity) {
            $objectName = ltrim($objectName, '\\');
            $classEntity = $this->cacheablePhpEntityFactory->createClassLikeEntity(
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

    public function getEntityByClassName(string $className, bool $createIfNotExists = true): ?ClassLikeEntity
    {
        return $createIfNotExists ? $this->getLoadedOrCreateNew($className) : $this->get($className);
    }

    /**
     * Retrieving all entities that implement the specified interfaces. Filtering is only available for ClassLikeEntity.
     *
     * @param string[] $interfaces
     *
     * @throws InvalidConfigurationParameterException
     */
    public function filterByInterfaces(array $interfaces): PhpEntitiesCollection
    {
        $entitiesCollection = $this->cloneForFiltration();
        $interfaces = array_map(
            fn($interface) => ltrim(
                str_replace('\\\\', '\\', $interface),
                '\\'
            ),
            $interfaces
        );
        foreach ($entitiesCollection as $objectId => $entity) {
            if (!is_a($entity, ClassLikeEntity::class)) {
                $entitiesCollection->remove($objectId);
                continue;
            }
            $entityInterfaces = array_map(
                fn($interface) => ltrim($interface, '\\'),
                $entity->getInterfaceNames()
            );
            if (!array_intersect($interfaces, $entityInterfaces)) {
                $entitiesCollection->remove($objectId);
            }
        }
        return $entitiesCollection;
    }

    /**
     * Retrieving all entities that inherit from the specified classes. Filtering is only available for ClassLikeEntity.
     *
     * @throws InvalidConfigurationParameterException
     */
    public function filterByParentClassNames(array $parentClassNames): PhpEntitiesCollection
    {
        $entitiesCollection = $this->cloneForFiltration();
        $parentClassNames = array_map(
            fn($parentClassName) => ltrim(
                str_replace('\\\\', '\\', $parentClassName),
                '\\'
            ),
            $parentClassNames
        );
        foreach ($entitiesCollection as $objectId => $entity) {
            if (!is_a($entity, ClassLikeEntity::class)) {
                $entitiesCollection->remove($objectId);
                continue;
            }

            $entityParentClassNames = array_map(
                fn($parentClassName) => ltrim($parentClassName, '\\'),
                $entity->getParentClassNames()
            );
            if (!array_intersect($parentClassNames, $entityParentClassNames)) {
                $entitiesCollection->remove($objectId);
            }
        }
        return $entitiesCollection;
    }

    /**
     * Filtering entities by relative files paths (from project_root) of the project
     *
     * @throws InvalidConfigurationParameterException
     */
    public function filterByPaths(array $paths): PhpEntitiesCollection
    {
        $entitiesCollection = $this->cloneForFiltration();
        foreach ($entitiesCollection as $objectId => $entity) {
            $needToKeep = false;
            /**@var RootEntityInterface $entity */
            foreach ($paths as $path) {
                if (str_starts_with($entity->getRelativeFileName(), $path)) {
                    $needToKeep = true;
                }
            }
            if (!$needToKeep) {
                $entitiesCollection->remove($objectId);
            }
        }
        return $entitiesCollection;
    }

    public function filterByNameRegularExpression(string $regexPattern): PhpEntitiesCollection
    {
        $entitiesCollection = $this->cloneForFiltration();
        foreach ($entitiesCollection as $objectId => $entity) {
            /**@var RootEntityInterface $entity */
            if (!preg_match($regexPattern, $entity->getShortName())) {
                $entitiesCollection->remove($objectId);
            }
        }
        return $entitiesCollection;
    }

    /**
     * Retrieving only instantiable entities. Filtering is only available for ClassLikeEntity.
     */
    public function getOnlyInstantiable(): PhpEntitiesCollection
    {
        $entitiesCollection = $this->cloneForFiltration();
        foreach ($entitiesCollection as $objectId => $entity) {
            if (!is_a($entity, ClassLikeEntity::class) || !$entity->isInstantiable()) {
                $entitiesCollection->remove($objectId);
            }
        }
        return $entitiesCollection;
    }

    public function getOnlyInterfaces(): PhpEntitiesCollection
    {
        $entitiesCollection = $this->cloneForFiltration();
        foreach ($entitiesCollection as $objectId => $entity) {
            if (!is_a($entity, InterfaceEntity::class)) {
                $entitiesCollection->remove($objectId);
            }
        }
        return $entitiesCollection;
    }

    public function getOnlyTraits(): PhpEntitiesCollection
    {
        $entitiesCollection = $this->cloneForFiltration();
        foreach ($entitiesCollection as $objectId => $entity) {
            if (!is_a($entity, TraitEntity::class)) {
                $entitiesCollection->remove($objectId);
            }
        }
        return $entitiesCollection;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getOnlyAbstractClasses(): PhpEntitiesCollection
    {
        $entitiesCollection = $this->cloneForFiltration();
        foreach ($entitiesCollection as $objectId => $entity) {
            if (!is_a($entity, ClassEntity::class) || !$entity->isAbstract()) {
                $entitiesCollection->remove($objectId);
            }
        }
        return $entitiesCollection;
    }

    /**
     * @param string $search
     *  Search query. For the search, only the main part is taken, up to the characters: `::`, `->`, `#`.
     *  If the request refers to multiple existing entities and if unsafe keys are allowed,
     *  a warning will be shown and the first entity found will be used.
     *
     * @param bool $useUnsafeKeys Whether to use search keys that can be used to find several entities
     *
     * @return ClassLikeEntity|null
     *
     * @example
     *  $entitiesCollection->findEntity('App'); // class name
     *  $entitiesCollection->findEntity('BumbleDocGen\Console\App'); // class with namespace
     *  $entitiesCollection->findEntity('\BumbleDocGen\Console\App'); // class with namespace
     *  $entitiesCollection->findEntity('\BumbleDocGen\Console\App::test()'); // class with namespace and optional part
     *  $entitiesCollection->findEntity('App.php'); // filename
     *  $entitiesCollection->findEntity('/BumbleDocGen/Console/App.php'); // relative path
     *  $entitiesCollection->findEntity('/Users/someuser/Desktop/projects/bumble-doc-gen/BumbleDocGen/Console/App.php'); // absolute path
     *  $entitiesCollection->findEntity('https://github.com/bumble-tech/bumble-doc-gen/blob/master/BumbleDocGen/Console/App.php'); // source link
     */
    public function internalFindEntity(string $search, bool $useUnsafeKeys = true): ?ClassLikeEntity
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
                if ($entity->isEntityDataCanBeLoaded() && $entity->getRelativeFileName()) {
                    $index[$entity->getRelativeFileName()] = $entity;
                    $index[$entity->getAbsoluteFileName()] = $entity;
                    $index[$entity->getFileSourceLink(false)] = $entity;

                    $shortFileName = array_reverse(explode('/', $entity->getRelativeFileName()))[0];
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
                preg_match('/^(\/?)(([a-zA-Z_])([a-zA-Z_0-9\\\\]+))((::|->))?/', $preparedSearch, $matches) &&
                isset($index[$matches[2]])
            ) {
                $entity = $index[$matches[2]];
                $foundKey = $matches[2];
            }
        }

        if (array_key_exists($foundKey, $duplicates)) {
            if ($useUnsafeKeys) {
                $this->logger->warning(
                    "PhpEntityCollection:findEntity: Key `{$foundKey}` refers to multiple entities. Use a unique search key to avoid mistakes"
                );
            } else {
                return null;
            }
        }

        return $entity;
    }

    /**
     * @inheritDoc
     * @throws InvalidConfigurationParameterException
     */
    public function getEntityLinkData(
        string $rawLink,
        ?string $defaultEntityName = null,
        bool $useUnsafeKeys = true
    ): array {
        return $this->docRendererHelper->getEntityDataByLink(
            $rawLink,
            $this,
            $defaultEntityName,
            $useUnsafeKeys
        );
    }
}
