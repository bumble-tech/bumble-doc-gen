<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity;

use BumbleDocGen\Core\Cache\LocalCache\Exception\ObjectNotFoundException;
use BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache;
use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\Cache\CacheableMethod;
use BumbleDocGen\Core\Parser\Entity\RootEntityInterface;
use BumbleDocGen\Core\Renderer\Context\DocumentTransformableEntityInterface;
use BumbleDocGen\Core\Renderer\EntityDocRenderer\EntityDocRendererInterface;
use BumbleDocGen\Core\Renderer\Twig\Filter\PrepareSourceLink;
use BumbleDocGen\LanguageHandler\Php\Parser\ComposerHelper;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\ClassConstant\ClassConstantEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\ClassConstant\ClassConstantEntitiesCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Method\MethodEntitiesCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Property\PropertyEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Property\PropertyEntitiesCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper;
use BumbleDocGen\LanguageHandler\Php\Parser\PhpParser\NodeValueCompiler;
use BumbleDocGen\LanguageHandler\Php\Parser\PhpParser\PhpParserHelper;
use BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings;
use DI\Attribute\Inject;
use DI\Container;
use DI\DependencyException;
use DI\NotFoundException;
use PhpParser\ConstExprEvaluationException;
use PhpParser\Node;
use PhpParser\Node\Stmt\Class_ as ClassNode;
use PhpParser\Node\Stmt\ClassConst as ConstNode;
use PhpParser\Node\Stmt\ClassMethod as MethodNode;
use PhpParser\Node\Stmt\Enum_ as EnumNode;
use PhpParser\Node\Stmt\Interface_ as InterfaceNode;
use PhpParser\Node\Stmt\Namespace_ as NamespaceNode;
use PhpParser\Node\Stmt\Property as PropertyNode;
use PhpParser\Node\Stmt\Trait_ as TraitNode;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitor\NameResolver;
use Psr\Log\LoggerInterface;

abstract class ClassLikeEntity extends BaseEntity implements DocumentTransformableEntityInterface, RootEntityInterface
{
    #[Inject] private Container $diContainer;

    private array $pluginsData = [];
    private bool $relativeFileNameLoaded = false;
    private bool $isClassLoad = false;

    public function __construct(
        private Configuration $configuration,
        private PhpHandlerSettings $phpHandlerSettings,
        private PhpEntitiesCollection $entitiesCollection,
        private ParserHelper $parserHelper,
        private ComposerHelper $composerHelper,
        private PhpParserHelper $phpParserHelper,
        private LocalObjectCache $localObjectCache,
        protected LoggerInterface $logger,
        private string $className,
        private ?string $relativeFileName,
    ) {
        parent::__construct(
            $configuration,
            $localObjectCache,
            $parserHelper,
            $logger
        );
        if ($relativeFileName) {
            $this->relativeFileNameLoaded = true;
        }
    }

    public static function isEntityNameValid(string $entityName): bool
    {
        return ParserHelper::isCorrectClassName($entityName);
    }

    public function isClass(): bool
    {
        return false;
    }

    public function isInterface(): bool
    {
        return false;
    }

    public function isTrait(): bool
    {
        return false;
    }

    public function isEnum(): bool
    {
        return false;
    }

    public function getObjectId(): string
    {
        return $this->className;
    }

    public function isExternalLibraryEntity(): bool
    {
        return !is_null($this->composerHelper->getComposerPackageDataByClassName($this->getName()));
    }

    final public function getRootEntityCollection(): PhpEntitiesCollection
    {
        return $this->entitiesCollection;
    }

    /**
     * {@inheritDoc}
     * @throws InvalidConfigurationParameterException
     * @throws \Exception
     */
    public function getEntityDependencies(): array
    {
        $fileDependencies = [];
        if ($this->isClassLoad()) {
            $parentClassNames = $this->getParentClassNames();
            $traitClassNames = $this->getTraitsNames();
            $interfaceNames = $this->getInterfaceNames();

            $classNames = array_unique(array_merge($parentClassNames, $traitClassNames, $interfaceNames));
            $classNames = array_filter(
                $classNames,
                function (string $className): bool {
                    return !$this->composerHelper->getComposerPackageDataByClassName($className) && !$this->parserHelper->isBuiltInClass($className);
                }
            );

            $reflections = array_map(fn(string $className) => $this->getRootEntityCollection()->getLoadedOrCreateNew($className), $classNames);
            $reflections[] = $this;
            foreach ($reflections as $reflectionClass) {
                $relativeFileName = $reflectionClass->getRelativeFileName();
                if ($relativeFileName) {
                    $fileName = $this->configuration->getProjectRoot() . '/' . $relativeFileName;
                    $fileDependencies[$relativeFileName] = md5_file($fileName);
                }
            }
        }
        return $fileDependencies;
    }

    /**
     * Checking if class file is in git repository
     */
    final public function isInGit(): bool
    {
        try {
            if (!$this->getRelativeFileName()) {
                return false;
            }
            $filesInGit = $this->parserHelper->getFilesInGit();
            $fileName = ltrim($this->getRelativeFileName(), DIRECTORY_SEPARATOR);
            return isset($filesInGit[$fileName]);
        } catch (\Exception) {
        }
        return false;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function isDocumentCreationAllowed(): bool
    {
        return !$this->configuration->isCheckFileInGitBeforeCreatingDocEnabled() || $this->isInGit();
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    public function getDocCommentEntity(): ClassLikeEntity
    {
        $objectId = $this->getObjectId();
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $objectId);
        } catch (ObjectNotFoundException) {
        }
        $docComment = $this->getDocComment();
        $classEntity = $this;
        if (!$docComment || str_contains(mb_strtolower($docComment), '@inheritdoc')) {
            $parentReflectionClass = $this->getParentClass();
            if ($parentReflectionClass && $parentReflectionClass->isEntityDataCanBeLoaded()) {
                $classEntity = $parentReflectionClass->getDocCommentEntity();
            }
        }
        $this->localObjectCache->cacheMethodResult(__METHOD__, $objectId, $classEntity);
        return $classEntity;
    }

    final public function loadPluginData(string $pluginKey, array $data): void
    {
        $this->pluginsData[$pluginKey] = $data;
    }

    final public function getPluginData(string $pluginKey): ?array
    {
        return $this->pluginsData[$pluginKey] ?? null;
    }

    final public function setCustomAst(TraitNode|EnumNode|InterfaceNode|ClassNode|null $customAst): void
    {
        $objectId = $this->getObjectId();
        $this->isClassLoad = true;
        $this->localObjectCache->cacheMethodResult(__CLASS__ . '::getAst', $objectId, $customAst);
    }
    /**
     * @throws \RuntimeException
     * @throws InvalidConfigurationParameterException
     */
    final public function getAst(): ClassNode|InterfaceNode|TraitNode|EnumNode
    {
        $objectId = $this->getObjectId();
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $objectId);
        } catch (ObjectNotFoundException) {
        }

        $ast = null;
        $nodes = $this->phpParserHelper->phpParser()->parse($this->getFileContent());
        $nodeTraverser = new NodeTraverser();
        $nodeTraverser->addVisitor(new NameResolver());
        $nodes = $nodeTraverser->traverse($nodes);
        foreach ($nodes as $node) {
            if (in_array(get_class($node), [ClassNode::class, InterfaceNode::class, TraitNode::class, EnumNode::class])) {
                $className = $node->name->toString();
                if ($className === $this->getName()) {
                    $ast = $node;
                    break;
                }
            } elseif (!$node instanceof NamespaceNode) {
                continue;
            }
            $namespaceName = $node->name->toString();
            foreach ($node->stmts as $subNode) {
                if (!in_array(get_class($subNode), [ClassNode::class, InterfaceNode::class, TraitNode::class, EnumNode::class])) {
                    continue;
                }
                $className = "{$namespaceName}\\{$subNode->name->toString()}";
                if ($className === $this->getName()) {
                    $ast = $subNode;
                    break 2;
                }
            }
        }

        if (!$ast) {
            throw new \RuntimeException("Entity `{$this->getName()}` not found");
        }
        $this->isClassLoad = true;
        $this->localObjectCache->cacheMethodResult(__METHOD__, $objectId, $ast);
        return $ast;
    }

    public function getImplementingClass(): ClassLikeEntity
    {
        return $this;
    }

    public function getName(): string
    {
        return $this->className;
    }

    /**
     * @internal
     */
    public function isClassLoad(): bool
    {
        if (!$this->isClassLoad) {
            try {
                $this->isClassLoad = ParserHelper::isCorrectClassName($this->getName()) && $this->getRelativeFileName();
            } catch (\Exception) {
                $this->isClassLoad = false;
            }
        }
        return $this->isClassLoad;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function isEntityDataCanBeLoaded(): bool
    {
        if (!$this->isCurrentEntityCanBeLoad()) {
            $this->logger->notice("Class `{$this->getName()}` loading skipped by plugin");
            return false;
        }
        return !$this->isExternalLibraryEntity() && $this->isEntityFileCanBeLoad();
    }

    public function getShortName(): string
    {
        $nameParts = explode('\\', $this->getName());
        return end($nameParts);
    }

    #[CacheableMethod] public function getNamespaceName(): string
    {
        $namespaceParts = explode('\\', $this->getName());
        if (count($namespaceParts) < 2) {
            return '';
        }
        array_pop($namespaceParts);
        return implode('\\', $namespaceParts);
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getRelativeFileName(bool $loadIfEmpty = true): ?string
    {
        if (!$this->relativeFileNameLoaded && $loadIfEmpty) {
            $this->relativeFileNameLoaded = true;
            $fileName = $this->composerHelper->getComposerClassLoader()->findFile($this->getName());
            $projectRoot = $this->configuration->getProjectRoot();
            if (!$fileName || !str_starts_with($fileName, $projectRoot)) {
                return null;
            }
            $this->relativeFileName = str_replace(
                [$projectRoot, '//'],
                ['', '/'],
                $fileName
            );
        }
        return $this->relativeFileName;
    }

    public function isInstantiable(): bool
    {
        return false;
    }

    public function isAbstract(): bool
    {
        return false;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getStartLine(): int
    {
        return $this->getAst()->getStartLine();
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getEndLine(): int
    {
        return $this->getAst()->getEndLine();
    }

    /**
     * @return ClassLikeEntity[] $trait
     * @throws InvalidConfigurationParameterException
     */
    public function getTraits(): array
    {
        $traits = [];
        foreach ($this->getTraitsNames() as $traitsName) {
            $traits[] = $this->entitiesCollection->getLoadedOrCreateNew($traitsName);
        }
        return $traits;
    }

    /**
     * @return ClassLikeEntity[]
     *
     * @throws InvalidConfigurationParameterException
     */
    public function getInterfacesEntities(): array
    {
        $interfacesEntities = [];
        foreach ($this->getInterfaceNames() as $interfaceClassName) {
            $interfacesEntities[] = $this->getRootEntityCollection()->getLoadedOrCreateNew($interfaceClassName);
        }
        return $interfacesEntities;
    }

    public function getParentClassNames(): array
    {
        return [];
    }

    /**
     * @return ClassLikeEntity[]
     * @throws InvalidConfigurationParameterException
     */
    public function getParentClassEntities(): array
    {
        return array_map(
            fn(string $className) => $this->getRootEntityCollection()->getLoadedOrCreateNew($className),
            $this->getParentClassNames()
        );
    }

    /**
     * @return string[]
     *
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getInterfaceNames(): array
    {
        if (!$this->isEntityDataCanBeLoaded()) {
            return [];
        }

        $objectId = $this->getObjectId();
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $objectId);
        } catch (ObjectNotFoundException) {
        }

        $interfaceNames = [];

        $node = $this->getAst();
        $nodes = $node instanceof InterfaceNode ? $node->extends : $node->implements;
        $interfaces = array_map(static fn($n) => $n->toString(), $nodes ?? []);
        foreach ($interfaces as $interfaceName) {
            if ($interfaceName === $this->getName()) {
                continue;
            }
            $parentInterfaceNames = [];
            try {
                $interfaceEntity = $this->getRootEntityCollection()->getLoadedOrCreateNew($interfaceName);
                if ($interfaceEntity->isEntityDataCanBeLoaded()) {
                    $parentInterfaceNames = $interfaceEntity->getInterfaceNames();
                }
            } catch (\Exception $e) {
                $this->logger->error($e->getMessage());
            }
            $interfaceNames = array_merge($interfaceNames, ["\\{$interfaceName}"], $parentInterfaceNames);
        }
        if (!$this->isInterface() && $parentClass = $this->getParentClass()) {
            $parentInterfaceNames = [];
            try {
                if ($parentClass->isEntityDataCanBeLoaded()) {
                    $parentInterfaceNames = $parentClass->getInterfaceNames();
                }
            } catch (\Exception $e) {
                $this->logger->error($e->getMessage());
            }
            $interfaceNames = array_merge($interfaceNames, $parentInterfaceNames);
        }
        $interfaceNames = array_unique($interfaceNames);
        $this->localObjectCache->cacheMethodResult(__METHOD__, $objectId, $interfaceNames);
        return $interfaceNames;
    }

    public function getParentClassName(): ?string
    {
        return null;
    }

    public function getParentClass(): ?ClassLikeEntity
    {
        return null;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getTraitsNames(): array
    {
        if (!$this->isEntityDataCanBeLoaded()) {
            return [];
        }
        $traitsNames = [];
        /**@var Node\Stmt\TraitUse[] $traitsNodes * */
        $traitsNodes = array_filter($this->getAst()->stmts, static fn(Node\Stmt $stmt): bool => $stmt instanceof Node\Stmt\TraitUse);
        foreach ($traitsNodes as $node) {
            foreach ($node->traits as $traitNode) {
                $traitsNames[] = $traitNode->toString();
            }
        }
        return $traitsNames;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function hasTraits(): bool
    {
        return count($this->getTraitsNames()) > 0;
    }

    /**
     * Get a list of all constants and classes where they are implemented
     *
     * @internal
     *
     * @param bool $onlyFromCurrentClassAndTraits Get data only for constants from the current class
     * @param int $flags Get data only for constants corresponding to the visibility modifiers passed in this value
     *
     * @return array<string, string>
     *
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getConstantsData(
        bool $onlyFromCurrentClassAndTraits = false,
        int $flags = ClassConstantEntity::VISIBILITY_MODIFIERS_FLAG_ANY
    ): array {
        if (!$this->isEntityDataCanBeLoaded()) {
            return [];
        }
        $constants = [];
        /** @var ConstNode[] $constNodes */
        $constNodes = array_filter(
            $this->getAst()->stmts,
            static fn(Node\Stmt $stmt): bool => $stmt instanceof ConstNode,
        );
        array_walk($constNodes, fn(ConstNode $stmt) => $stmt->flags = $stmt->flags ?: ClassConstantEntity::MODIFIERS_FLAG_IS_PUBLIC);
        foreach ($constNodes as $constNode) {
            if (($constNode->flags & $flags) === 0) {
                continue;
            }
            foreach ($constNode->consts as $constant) {
                $constants[$constant->name->toString()] = $this->getName();
            }
        }

        $flags &= ~  ClassConstantEntity::MODIFIERS_FLAG_IS_PRIVATE;
        foreach ($this->getTraits() as $traitEntity) {
            if (!$traitEntity->isEntityDataCanBeLoaded()) {
                continue;
            }
            foreach ($traitEntity->getConstantsData(true, $flags) as $name => $constantsData) {
                if (array_key_exists($name, $constants)) {
                    continue;
                }
                $constants[$name] = $constantsData;
            }
        }

        if (!$onlyFromCurrentClassAndTraits) {
            foreach ($this->getParentClassEntities() as $parentClassEntity) {
                if (!$parentClassEntity->isEntityDataCanBeLoaded()) {
                    continue;
                }
                foreach ($parentClassEntity->getConstantsData(true, $flags) as $name => $constantsData) {
                    if (array_key_exists($name, $constants)) {
                        continue;
                    }
                    $constants[$name] = $constantsData;
                }
            }

            foreach ($this->getInterfacesEntities() as $interfacesEntity) {
                if (!$interfacesEntity->isEntityDataCanBeLoaded()) {
                    continue;
                }
                foreach ($interfacesEntity->getConstantsData(true, $flags) as $name => $constantsData) {
                    if (array_key_exists($name, $constants)) {
                        continue;
                    }
                    $constants[$name] = $constantsData;
                }
            }
        }
        return $constants;
    }

    /**
     * Get a collection of constant entities
     *
     * @api
     *
     * @see PhpHandlerSettings::getClassConstantEntityFilter()
     *
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    public function getConstantEntitiesCollection(): ClassConstantEntitiesCollection
    {
        $objectId = $this->getObjectId();
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $objectId);
        } catch (ObjectNotFoundException) {
        }
        $constantEntitiesCollection = $this->diContainer->make(ClassConstantEntitiesCollection::class, [
            'classEntity' => $this
        ]);
        $constantEntitiesCollection->loadConstantEntities();
        $this->localObjectCache->cacheMethodResult(__METHOD__, $objectId, $constantEntitiesCollection);
        return $constantEntitiesCollection;
    }

    /**
     * Get all constants that are available according to the configuration as an array
     *
     * @return ClassConstantEntity[]
     *
     * @see self::getConstantEntitiesCollection()
     * @see PhpHandlerSettings::getClassConstantEntityFilter()
     *
     * @api
     *
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    public function getConstants(): array
    {
        $constantEntitiesCollection = $this->getConstantEntitiesCollection();
        return iterator_to_array($constantEntitiesCollection);
    }

    /**
     * Check if a constant exists in a class
     *
     * @param string $constantName The name of the class whose entity you want to check
     * @param bool $unsafe Check all constants, not just the constants allowed in the configuration (@see PhpHandlerSettings::getClassConstantEntityFilter())
     *
     * @return bool The constant exists
     *
     * @api
     *
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public function hasConstant(string $constantName, bool $unsafe = false): bool
    {
        $constantEntitiesCollection = $this->getConstantEntitiesCollection();
        if ($unsafe) {
            return array_key_exists($constantName, $this->getConstantsData());
        }
        return $constantEntitiesCollection->has($constantName);
    }

    /**
     * Get the method entity by its name
     *
     * @param string $constantName The name of the constant whose entity you want to get
     * @param bool $unsafe Check all constants, not just the constants allowed in the configuration (@see PhpHandlerSettings::getClassConstantEntityFilter())
     *
     * @api
     *
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    public function getConstant(string $constantName, bool $unsafe = false): ?ClassConstantEntity
    {
        $constantEntitiesCollection = $this->getConstantEntitiesCollection();
        if ($unsafe) {
            return $constantEntitiesCollection->unsafeGet($constantName);
        }
        return $constantEntitiesCollection->get($constantName);
    }

    /**
     * Get the compiled value of a constant
     *
     * @param string $constantName The name of the constant for which you need to get the value
     *
     * @return string|array|int|bool|float|null Compiled constant value
     *
     * @api
     *
     * @throws ConstExprEvaluationException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    public function getConstantValue(string $constantName): string|array|int|bool|null|float
    {
        return $this->getConstant($constantName, true)->getValue();
    }

    /**
     * Get class constant compiled values according to filters
     *
     * @param bool $onlyFromCurrentClassAndTraits Get values only for constants from the current class
     * @param int $flags Get values only for constants corresponding to the visibility modifiers passed in this value
     *
     * @return array<string, mixed>
     *
     * @api
     *
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws ConstExprEvaluationException
     */
    public function getConstantsValues(
        bool $onlyFromCurrentClassAndTraits = false,
        int $flags = ClassConstantEntity::VISIBILITY_MODIFIERS_FLAG_ANY
    ): array {
        $constants = [];
        foreach ($this->getConstantsData($onlyFromCurrentClassAndTraits, $flags) as $constantName => $implementingClassName) {
            $constants[$constantName] = $this->getConstantValue($constantName);
        }
        return $constants;
    }

    /**
     * Get a list of all properties and classes where they are implemented
     *
     * @param bool $onlyFromCurrentClassAndTraits Get data only for properties from the current class
     * @param int $flags Get data only for properties corresponding to the visibility modifiers passed in this value
     *
     * @return array<string, string>
     *
     * @internal
     *
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getPropertiesData(
        bool $onlyFromCurrentClassAndTraits = false,
        int $flags = PropertyEntity::VISIBILITY_MODIFIERS_FLAG_ANY
    ): array {
        if (!$this->isEntityDataCanBeLoaded()) {
            return [];
        }
        $properties = [];
        /** @var PropertyNode[] $propertyNodes */
        $propertyNodes = array_filter(
            $this->getAst()->stmts,
            static fn(Node\Stmt $stmt): bool => $stmt instanceof PropertyNode,
        );
        array_walk($propertyNodes, fn(PropertyNode $stmt) => $stmt->flags = $stmt->flags ?: PropertyEntity::MODIFIERS_FLAG_IS_PUBLIC);
        foreach ($propertyNodes as $node) {
            if (($node->flags & $flags) === 0) {
                continue;
            }
            foreach ($node->props as $propertyNode) {
                $properties[$propertyNode->name->toString()] = $this->getName();
            }
        }

        $flags &= ~ PropertyEntity::MODIFIERS_FLAG_IS_PRIVATE;
        foreach ($this->getTraits() as $traitEntity) {
            foreach ($traitEntity->getPropertiesData(true, $flags) as $name => $propertyData) {
                if (!$traitEntity->isEntityDataCanBeLoaded()) {
                    continue;
                }
                if (array_key_exists($name, $properties)) {
                    continue;
                }
                $properties[$name] = $propertyData;
            }
        }
        if (!$onlyFromCurrentClassAndTraits) {
            foreach ($this->getParentClassEntities() as $parentClassEntity) {
                if (!$parentClassEntity->isEntityDataCanBeLoaded()) {
                    continue;
                }
                foreach ($parentClassEntity->getPropertiesData(true, $flags) as $name => $propertyData) {
                    if (array_key_exists($name, $properties)) {
                        continue;
                    }
                    $properties[$name] = $propertyData;
                }
            }
        }
        return $properties;
    }

    /**
     * Get a collection of property entities
     *
     * @api
     *
     * @see PhpHandlerSettings::getPropertyEntityFilter()
     *
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    public function getPropertyEntitiesCollection(): PropertyEntitiesCollection
    {
        $objectId = $this->getObjectId();
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $objectId);
        } catch (ObjectNotFoundException) {
        }
        $propertyEntitiesCollection = $this->diContainer->make(PropertyEntitiesCollection::class, [
            'classEntity' => $this
        ]);
        $propertyEntitiesCollection->loadPropertyEntities();
        $this->localObjectCache->cacheMethodResult(__METHOD__, $objectId, $propertyEntitiesCollection);
        return $propertyEntitiesCollection;
    }

    /**
     * Get all properties that are available according to the configuration as an array
     *
     * @return PropertyEntity[]
     *
     * @api
     *
     * @see self::getPropertyEntitiesCollection()
     * @see PhpHandlerSettings::getPropertyEntityFilter()
     *
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    public function getProperties(): array
    {
        $propertyEntitiesCollection = $this->getPropertyEntitiesCollection();
        return iterator_to_array($propertyEntitiesCollection);
    }

    /**
     * Check if a property exists in a class
     *
     * @param string $propertyName The name of the property whose entity you want to check
     * @param bool $unsafe Check all properties, not just the properties allowed in the configuration (@see PhpHandlerSettings::getPropertyEntityFilter())
     *
     * @return bool The property exists
     *
     * @api
     *
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    public function hasProperty(string $propertyName, bool $unsafe = false): bool
    {
        $propertyEntitiesCollection = $this->getPropertyEntitiesCollection();
        if ($unsafe) {
            return array_key_exists($propertyName, $this->getPropertiesData());
        }
        return $propertyEntitiesCollection->has($propertyName);
    }

    /**
     * Get the property entity by its name
     *
     * @param string $propertyName The name of the property whose entity you want to get
     * @param bool $unsafe Check all properties, not just the properties allowed in the configuration (@see PhpHandlerSettings::getPropertyEntityFilter())
     *
     * @api
     *
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    public function getProperty(string $propertyName, bool $unsafe = false): ?PropertyEntity
    {
        $propertyEntitiesCollection = $this->getPropertyEntitiesCollection();
        if ($unsafe) {
            return $propertyEntitiesCollection->unsafeGet($propertyName);
        }
        return $propertyEntitiesCollection->get($propertyName);
    }

    /**
     * Get the compiled value of a property
     *
     * @param string $propertyName The name of the property for which you need to get the value
     *
     * @return string|array|int|bool|float|null Compiled property value
     *
     * @api
     *
     * @throws ConstExprEvaluationException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    public function getPropertyDefaultValue(string $propertyName): string|array|int|bool|null|float
    {
        return $this->getProperty($propertyName, true)->getDefaultValue();
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getFileContent(): string
    {
        $objectId = $this->getObjectId();
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $objectId);
        } catch (ObjectNotFoundException) {
        }
        $fileContent = $this->getAbsoluteFileName() ? file_get_contents($this->getAbsoluteFileName()) : '';
        $this->localObjectCache->cacheMethodResult(__METHOD__, $objectId, $fileContent);
        return $fileContent;
    }

    /**
     * Get a list of all methods and classes where they are implemented
     *
     * @internal
     *
     * @param bool $onlyFromCurrentClassAndTraits Get data only for methods from the current class
     * @param int $flags Get data only for methods corresponding to the visibility modifiers passed in this value
     *
     * @return array<string, string>
     *
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getMethodsData(
        bool $onlyFromCurrentClassAndTraits = false,
        int $flags = MethodEntity::VISIBILITY_MODIFIERS_FLAG_ANY
    ): array {
        if (!$this->isEntityDataCanBeLoaded()) {
            return [];
        }
        $methods = [];
        /** @var MethodNode[] $methodNodes */
        $methodNodes = array_filter(
            $this->getAst()->stmts,
            static fn(Node\Stmt $stmt): bool => $stmt instanceof MethodNode,
        );
        array_walk($methodNodes, fn(MethodNode $stmt) => $stmt->flags = $stmt->flags ?: MethodEntity::MODIFIERS_FLAG_IS_PUBLIC);
        foreach ($methodNodes as $methodNode) {
            if (($methodNode->flags & $flags) === 0) {
                continue;
            }
            $methods[$methodNode->name->toString()] = $this->getName();
        }

        $flags &= ~ MethodEntity::MODIFIERS_FLAG_IS_PRIVATE;
        foreach ($this->getTraits() as $traitEntity) {
            if (!$traitEntity->isEntityDataCanBeLoaded()) {
                continue;
            }
            foreach ($traitEntity->getMethodsData(true, $flags) as $name => $methodsData) {
                if (array_key_exists($name, $methods)) {
                    continue;
                }
                $methods[$name] = $methodsData;
            }
        }

        if (!$onlyFromCurrentClassAndTraits) {
            foreach ($this->getParentClassEntities() as $parentClassEntity) {
                if (!$parentClassEntity->isEntityDataCanBeLoaded()) {
                    continue;
                }
                foreach ($parentClassEntity->getMethodsData(true, $flags) as $name => $methodsData) {
                    if (array_key_exists($name, $methods)) {
                        continue;
                    }
                    $methods[$name] = $methodsData;
                }
            }

            foreach ($this->getInterfacesEntities() as $interfacesEntity) {
                if (!$interfacesEntity->isEntityDataCanBeLoaded()) {
                    continue;
                }
                foreach ($interfacesEntity->getMethodsData(true, $flags) as $name => $methodsData) {
                    if (array_key_exists($name, $methods)) {
                        continue;
                    }
                    $methods[$name] = $methodsData;
                }
            }
        }

        return $methods;
    }

    /**
     * Get a collection of method entities
     *
     * @api
     *
     * @see PhpHandlerSettings::getMethodEntityFilter()
     *
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    public function getMethodEntitiesCollection(): MethodEntitiesCollection
    {
        $objectId = $this->getObjectId();
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $objectId);
        } catch (ObjectNotFoundException) {
        }
        $methodEntitiesCollection = $this->diContainer->make(MethodEntitiesCollection::class, [
            'classEntity' => $this
        ]);
        $methodEntitiesCollection->loadMethodEntities();
        $this->localObjectCache->cacheMethodResult(__METHOD__, $objectId, $methodEntitiesCollection);
        return $methodEntitiesCollection;
    }

    /**
     * Get all methods that are available according to the configuration as an array
     *
     * @api
     *
     * @return MethodEntity[]
     *
     * @see self::getMethodEntitiesCollection()
     * @see PhpHandlerSettings::getMethodEntityFilter()
     *
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    public function getMethods(): array
    {
        $methodEntitiesCollection = $this->getMethodEntitiesCollection();
        return iterator_to_array($methodEntitiesCollection);
    }

    /**
     * Check if a method exists in a class
     *
     * @api
     *
     * @param string $methodName The name of the method whose entity you want to check
     * @param bool $unsafe Check all methods, not just the methods allowed in the configuration (@see PhpHandlerSettings::getMethodEntityFilter())
     *
     * @return bool The method exists
     *
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    public function hasMethod(string $methodName, bool $unsafe = false): bool
    {
        $methodEntitiesCollection = $this->getMethodEntitiesCollection();
        if ($unsafe) {
            return array_key_exists($methodName, $this->getMethodsData());
        }
        return $methodEntitiesCollection->has($methodName);
    }

    /**
     * Get the method entity by its name
     *
     * @api
     *
     * @param string $methodName The name of the method whose entity you want to get
     * @param bool $unsafe Check all methods, not just the methods allowed in the configuration (@see PhpHandlerSettings::getMethodEntityFilter())
     *
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    public function getMethod(string $methodName, bool $unsafe = false): ?MethodEntity
    {
        $methodEntitiesCollection = $this->getMethodEntitiesCollection();
        if ($unsafe) {
            return $methodEntitiesCollection->unsafeGet($methodName);
        }
        return $methodEntitiesCollection->get($methodName);
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function isSubclassOf(string $className): bool
    {
        $className = ltrim(str_replace('\\\\', '\\', $className), '\\');

        $parentClassNames = $this->getParentClassNames();
        $interfacesNames = $this->getInterfaceNames();
        $allClasses = array_map(
            fn($interface) => ltrim($interface, '\\'),
            array_merge($parentClassNames, $interfacesNames)
        );
        return in_array($className, $allClasses);
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function implementsInterface(string $interfaceName): bool
    {
        $interfaceName = ltrim(str_replace('\\\\', '\\', $interfaceName), '\\');
        $interfaces = array_map(
            fn($interface) => ltrim($interface, '\\'),
            $this->getInterfaceNames()
        );
        return in_array($interfaceName, $interfaces);
    }

    public function hasParentClass(string $parentClassName): bool
    {
        $parentClassName = ltrim(str_replace('\\\\', '\\', $parentClassName), '\\');
        $parentClassNames = array_map(
            fn($interface) => ltrim($interface, '\\'),
            $this->getParentClassNames()
        );
        return in_array($parentClassName, $parentClassNames);
    }

    /**
     * @throws InvalidConfigurationParameterException
     * @throws \Exception
     */
    public function getDocRender(): EntityDocRendererInterface
    {
        $objectId = $this->getObjectId();
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $objectId);
        } catch (ObjectNotFoundException) {
        }
        $docRenderer = $this->phpHandlerSettings->getEntityDocRenderersCollection()->getFirstMatchingRender($this);
        if (!$docRenderer) {
            throw new \Exception(
                "Renderer for file `{$this->getName()}` not found"
            );
        }
        $this->localObjectCache->cacheMethodResult(__METHOD__, $objectId, $docRenderer);
        return $docRenderer;
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public function cursorToDocAttributeLinkFragment(string $cursor, bool $isForDocument = true): string
    {
        if (
            !$cursor || !preg_match(
                '/^(((\$)(([a-zA-Z_])([a-zA-Z_0-9]+)))|(([a-zA-Z_])([a-zA-Z_0-9]+))|((([a-zA-Z_])([a-zA-Z_0-9]+))\(\)))$/',
                $cursor,
                $matches,
                PREG_UNMATCHED_AS_NULL
            )
        ) {
            return '';
        }

        $prefix = null;
        if ($attributeName = $matches[7]) {
            // is constant
            $prefix = 'q';
            if (!array_key_exists($matches[7], $this->getConstantsData())) {
                if ($this->hasMethod($matches[7], true)) {
                    // is method
                    $prefix = 'm';
                } elseif (array_key_exists($matches[7], $this->getPropertiesData())) {
                    // is property
                    $prefix = 'p';
                }
            }
        } elseif ($attributeName = $matches[4]) {
            // is property
            $prefix = 'p';
        } elseif ($attributeName = $matches[11]) {
            // is method
            $prefix = 'm';
        }

        if ($isForDocument) {
            $prepareSourceLink = new PrepareSourceLink();
            return "#{$prefix}{$prepareSourceLink($attributeName)}";
        }
        $line = match ($prefix) {
            'm' => $this->getMethod($attributeName, true)?->getStartLine(),
            'p' => $this->getProperty($attributeName, true)?->getStartLine(),
            'q' => $this->getConstant($attributeName, true)?->getStartLine(),
            default => 0,
        };
        return $line ? "#L{$line}" : '';
    }
}
