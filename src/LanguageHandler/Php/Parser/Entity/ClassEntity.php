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
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Ast\NodeValueCompiler;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Ast\PhpParserHelper;
use BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper;
use BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings;
use DI\Attribute\Inject;
use DI\Container;
use DI\DependencyException;
use DI\NotFoundException;
use phpDocumentor\Reflection\DocBlock;
use PhpParser\ConstExprEvaluationException;
use PhpParser\Node;
use PhpParser\Node\Stmt\Class_ as ClassNode;
use PhpParser\Node\Stmt\ClassConst as ConstNode;
use PhpParser\Node\Stmt\ClassMethod as MethodNode;
use PhpParser\Node\Stmt\Enum_ as EnumNode;
use PhpParser\Node\Stmt\EnumCase as EnumCaseNode;
use PhpParser\Node\Stmt\Interface_ as InterfaceNode;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\Node\Stmt\Property as PropertyNode;
use PhpParser\Node\Stmt\Trait_ as TraitNode;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitor\NameResolver;
use Psr\Log\LoggerInterface;

/**
 * Class entity
 */
class ClassEntity extends BaseEntity implements DocumentTransformableEntityInterface, RootEntityInterface
{
    #[Inject] private Container $diContainer;

    private array $pluginsData = [];
    private bool $relativeFileNameLoaded = false;
    private bool $isClassLoad = false;

    public function __construct(
        private Configuration $configuration,
        private PhpHandlerSettings $phpHandlerSettings,
        private ClassEntityCollection $classEntityCollection,
        private ParserHelper $parserHelper,
        private ComposerHelper $composerHelper,
        private PhpParserHelper $phpParserHelper,
        private LocalObjectCache $localObjectCache,
        private LoggerInterface $logger,
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

    public function getObjectId(): string
    {
        return $this->className;
    }

    public function isExternalLibraryEntity(): bool
    {
        return !is_null($this->composerHelper->getComposerPackageDataByClassName($this->getName()));
    }

    public function getPhpHandlerSettings(): PhpHandlerSettings
    {
        return $this->phpHandlerSettings;
    }

    public function getRootEntityCollection(): ClassEntityCollection
    {
        return $this->classEntityCollection;
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
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    public function getDocBlock(): DocBlock
    {
        $classEntity = $this->getDocCommentEntity();
        return $this->parserHelper->getDocBlock($classEntity, $this->getDocCommentRecursive());
    }

    /**
     * Checking if class file is in git repository
     */
    public function isInGit(): bool
    {
        try {
            if (!$this->getFileName()) {
                return false;
            }
            $filesInGit = $this->parserHelper->getFilesInGit();
            $fileName = ltrim($this->getFileName(), DIRECTORY_SEPARATOR);
            return isset($filesInGit[$fileName]);
        } catch (\Exception) {
        }
        return false;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function documentCreationAllowed(): bool
    {
        return !$this->configuration->isCheckFileInGitBeforeCreatingDocEnabled() || $this->isInGit();
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    public function getDocCommentEntity(): ClassEntity
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
            if ($parentReflectionClass && $parentReflectionClass->entityDataCanBeLoaded()) {
                $classEntity = $parentReflectionClass->getDocCommentEntity();
            }
        }
        $this->localObjectCache->cacheMethodResult(__METHOD__, $objectId, $classEntity);
        return $classEntity;
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    protected function getDocCommentRecursive(): string
    {
        return $this->getDocCommentEntity()->getDocComment() ?: ' ';
    }

    public function loadPluginData(string $pluginKey, array $data): void
    {
        $this->pluginsData[$pluginKey] = $data;
    }

    public function getPluginData(string $pluginKey): ?array
    {
        return $this->pluginsData[$pluginKey] ?? null;
    }

    public function setCustomAst(TraitNode|EnumNode|InterfaceNode|ClassNode|null $customAst): void
    {
        $objectId = $this->getObjectId();
        $this->isClassLoad = true;
        $this->localObjectCache->cacheMethodResult(__CLASS__ . '::getAst', $objectId, $customAst);
    }
    /**
     * @throws \RuntimeException
     * @throws InvalidConfigurationParameterException
     */
    public function getAst(): ClassNode|InterfaceNode|TraitNode|EnumNode
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
            } elseif (!$node instanceof Namespace_) {
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
            if ($this->getName() === 'MeetD') {
                $this->logger->emergency($this->getAbsoluteFileName());
                die();
            }
            throw new \RuntimeException("Entity `{$this->getName()}` not found");
        }
        $this->isClassLoad = true;
        $this->localObjectCache->cacheMethodResult(__METHOD__, $objectId, $ast);
        return $ast;
    }

    public function getImplementingClass(): ClassEntity
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
    #[CacheableMethod] public function entityDataCanBeLoaded(): bool
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
                $projectRoot,
                '',
                $fileName
            );
        }
        return $this->relativeFileName;
    }

    /**
     * {@inheritDoc}
     * @throws InvalidConfigurationParameterException
     */
    public function getFileName(): ?string
    {
        return $this->getRelativeFileName();
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getFullFileName(): ?string
    {
        $fileName = $this->getFileName();
        if (!$fileName) {
            return $fileName;
        }
        return "{$this->configuration->getProjectRoot()}{$fileName}";
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
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getModifiersString(): string
    {
        $modifiersString = [];
        if (!$this->isInterface() && !$this->isEnum() && !$this->isTrait() && $this->getAst()->isFinal()) {
            $modifiersString[] = 'final';
        }

        $isInterface = $this->isInterface();
        if ($isInterface) {
            $modifiersString[] = 'interface';
            return implode(' ', $modifiersString);
        } elseif ($this->isAbstract()) {
            $modifiersString[] = 'abstract';
        }

        if ($this->isTrait()) {
            $modifiersString[] = 'trait';
        } elseif ($this->isEnum()) {
            $modifiersString[] = 'enum';
        } else {
            $modifiersString[] = 'class';
        }

        return implode(' ', $modifiersString);
    }

    /**
     * @return ClassEntity[] $trait
     * @throws InvalidConfigurationParameterException
     */
    public function getTraits(): array
    {
        $traits = [];
        foreach ($this->getTraitsNames() as $traitsName) {
            $traits[] = $this->classEntityCollection->getLoadedOrCreateNew($traitsName);
        }
        return $traits;
    }

    /**
     * @return ClassEntity[]
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

    /**
     * @return string[]
     *
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getParentClassNames(): array
    {
        if (!$this->entityDataCanBeLoaded()) {
            return [];
        }
        if ($this->isInterface()) {
            return $this->getInterfaceNames();
        } else {
            try {
                $parentClass = $this->getParentClass();
                if ($parentClass?->entityDataCanBeLoaded() && $name = $parentClass?->getName()) {
                    return array_merge(["\\{$name}"], $parentClass->getParentClassNames());
                }
            } catch (\Exception $e) {
                $this->logger->warning($e->getMessage());
            }
        }
        return [];
    }

    /**
     * @return ClassEntity[]
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
        if (!$this->entityDataCanBeLoaded()) {
            return [];
        }

        if ($this->isTrait()) {
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
                if ($interfaceEntity->entityDataCanBeLoaded()) {
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
                if ($parentClass->entityDataCanBeLoaded()) {
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

    /**
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getParentClassName(): ?string
    {
        if (!$this->entityDataCanBeLoaded() || $this->isEnum()) {
            return null;
        }
        if (!$this->isInterface() && !$this->isTrait() && $parentClassName = $this->getAst()->extends?->toString()) {
            return '\\' . $parentClassName;
        }
        return null;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getParentClass(): ?ClassEntity
    {
        $parentClassName = $this->getParentClassName();
        if (!$parentClassName) {
            return null;
        }
        return $this->getRootEntityCollection()->getLoadedOrCreateNew($parentClassName);
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getTraitsNames(): array
    {
        if (!$this->entityDataCanBeLoaded()) {
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
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    public function getConstantEntityCollection(): ConstantEntityCollection
    {
        $objectId = $this->getObjectId();
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $objectId);
        } catch (ObjectNotFoundException) {
        }
        $constantEntityCollection = $this->diContainer->make(ConstantEntityCollection::class, [
            'classEntity' => $this
        ]);
        $constantEntityCollection->loadConstantEntities();
        $this->localObjectCache->cacheMethodResult(__METHOD__, $objectId, $constantEntityCollection);
        return $constantEntityCollection;
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    public function getConstantEntity(string $constantName, bool $unsafe = true): ?ConstantEntity
    {
        $constantEntityCollection = $this->getConstantEntityCollection();
        if ($unsafe) {
            return $constantEntityCollection->unsafeGet($constantName);
        }
        return $constantEntityCollection->get($constantName);
    }

    /**
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    public function getPropertyEntityCollection(): PropertyEntityCollection
    {
        $objectId = $this->getObjectId();
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $objectId);
        } catch (ObjectNotFoundException) {
        }
        $propertyEntityCollection = $this->diContainer->make(PropertyEntityCollection::class, [
            'classEntity' => $this
        ]);
        $propertyEntityCollection->loadPropertyEntities();
        $this->localObjectCache->cacheMethodResult(__METHOD__, $objectId, $propertyEntityCollection);
        return $propertyEntityCollection;
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    public function getPropertyEntity(string $propertyName, bool $unsafe = true): ?PropertyEntity
    {
        $propertyEntityCollection = $this->getPropertyEntityCollection();
        if ($unsafe) {
            return $propertyEntityCollection->unsafeGet($propertyName);
        }
        return $propertyEntityCollection->get($propertyName);
    }

    /**
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws NotFoundException
     */
    public function getMethodEntityCollection(): MethodEntityCollection
    {
        $objectId = $this->getObjectId();
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $objectId);
        } catch (ObjectNotFoundException) {
        }
        $methodEntityCollection = $this->diContainer->make(MethodEntityCollection::class, [
            'classEntity' => $this
        ]);
        $methodEntityCollection->loadMethodEntities();
        $this->localObjectCache->cacheMethodResult(__METHOD__, $objectId, $methodEntityCollection);
        return $methodEntityCollection;
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    public function getMethodEntity(string $methodName, bool $unsafe = true): ?MethodEntity
    {
        $methodEntityCollection = $this->getMethodEntityCollection();
        if ($unsafe) {
            return $methodEntityCollection->unsafeGet($methodName);
        }
        return $methodEntityCollection->get($methodName);
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    public function getDescription(): string
    {
        $docBlock = $this->getDocBlock();
        return $docBlock->getSummary();
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function isEnum(): bool
    {
        return $this->getAst() instanceof EnumNode;
    }

    /**
     * @throws InvalidConfigurationParameterException
     * @throws ConstExprEvaluationException
     */
    #[CacheableMethod] public function getCasesNames(): array
    {
        return array_keys($this->getEnumCases());
    }

    /**
     * @throws InvalidConfigurationParameterException
     * @throws ConstExprEvaluationException
     */
    #[CacheableMethod] public function getEnumCases(): array
    {
        if (!$this->entityDataCanBeLoaded() || !$this->isEnum()) {
            return [];
        }

        $enumCases = [];
        /** @var EnumCaseNode[] $enumCaseNodes */
        $enumCaseNodes = array_filter(
            $this->getAst()->stmts,
            static fn(Node\Stmt $stmt): bool => $stmt instanceof EnumCaseNode,
        );

        foreach ($enumCaseNodes as $enumCaseNode) {
            $enumCases[$enumCaseNode->name->toString()] = $enumCaseNode->expr ? NodeValueCompiler::compile($enumCaseNode->expr, $this) : null;
        }
        return $enumCases;
    }

    /**
     * @throws InvalidConfigurationParameterException
     * @throws ConstExprEvaluationException
     */
    #[CacheableMethod] public function getEnumCaseValue(string $name): mixed
    {
        return $this->getEnumCases()[$name] ?? null;
    }
    /**
     * Returns the absolute path to a file if it can be retrieved and if the file is in the project directory
     * @throws InvalidConfigurationParameterException
     */
    public function getAbsoluteFileName(): ?string
    {
        $relativeFileName = $this->getRelativeFileName();
        return $relativeFileName ? $this->configuration->getProjectRoot() . $relativeFileName : null;
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
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getMethodsData(
        bool $onlyFromCurrentClassAndTraits = false,
        int $flags = MethodEntity::VISIBILITY_MODIFIERS_FLAG_ANY
    ): array {
        if (!$this->entityDataCanBeLoaded()) {
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
            if (!$traitEntity->entityDataCanBeLoaded()) {
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
                if (!$parentClassEntity->entityDataCanBeLoaded()) {
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
                if (!$interfacesEntity->entityDataCanBeLoaded()) {
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
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getPropertiesData(
        bool $onlyFromCurrentClassAndTraits = false,
        int $flags = PropertyEntity::VISIBILITY_MODIFIERS_FLAG_ANY
    ): array {
        if (!$this->entityDataCanBeLoaded()) {
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
                if (!$traitEntity->entityDataCanBeLoaded()) {
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
                if (!$parentClassEntity->entityDataCanBeLoaded()) {
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
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getConstantsData(
        bool $onlyFromCurrentClassAndTraits = false,
        int $flags = ConstantEntity::VISIBILITY_MODIFIERS_FLAG_ANY
    ): array {
        if (!$this->entityDataCanBeLoaded()) {
            return [];
        }
        $constants = [];
        /** @var ConstNode[] $constNodes */
        $constNodes = array_filter(
            $this->getAst()->stmts,
            static fn(Node\Stmt $stmt): bool => $stmt instanceof ConstNode,
        );
        array_walk($constNodes, fn(ConstNode $stmt) => $stmt->flags = $stmt->flags ?: ConstantEntity::MODIFIERS_FLAG_IS_PUBLIC);
        foreach ($constNodes as $constNode) {
            if (($constNode->flags & $flags) === 0) {
                continue;
            }
            foreach ($constNode->consts as $constant) {
                $constants[$constant->name->toString()] = $this->getName();
            }
        }

        $flags &= ~  ConstantEntity::MODIFIERS_FLAG_IS_PRIVATE;
        foreach ($this->getTraits() as $traitEntity) {
            if (!$traitEntity->entityDataCanBeLoaded()) {
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
                if (!$parentClassEntity->entityDataCanBeLoaded()) {
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
                if (!$interfacesEntity->entityDataCanBeLoaded()) {
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
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function isInstantiable(): bool
    {
        if ($this->isAbstract()) {
            return false;
        }

        if ($this->isInterface()) {
            return false;
        }

        if ($this->isTrait()) {
            return false;
        }

        return $this->getAst()->getMethod('__construct')?->isPublic() ?? true;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function isAbstract(): bool
    {
        $ast = $this->getAst();
        if (!method_exists($ast, 'isAbstract')) {
            return false;
        }
        return $ast->isAbstract();
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function isInterface(): bool
    {
        return $this->getAst() instanceof InterfaceNode;
    }

    /**
     * @throws \RuntimeException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function isTrait(): bool
    {
        return $this->getAst() instanceof TraitNode;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function hasMethod(string $method): bool
    {
        return array_key_exists($method, $this->getMethodsData());
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function hasProperty(string $property): bool
    {
        return array_key_exists($property, $this->getPropertiesData());
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function hasConstant(string $constantName): bool
    {
        return array_key_exists($constantName, $this->getConstantsData(true));
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
     * @throws ConstExprEvaluationException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getConstant(string $name): string|array|int|bool|null|float
    {
        // todo return constant entity
        foreach ($this->getAst()->getConstants() as $node) {
            foreach ($node->consts as $constantNode) {
                if ($name === $constantNode->name->toString()) {
                    return NodeValueCompiler::compile($constantNode->value, $this);
                }
            }
        }
        return null;
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws ConstExprEvaluationException
     */
    #[CacheableMethod] public function getConstantValue(string $name): string|array|int|bool|null|float
    {

        return $this->getConstantEntity($name)->getValue();
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

    /**
     * @throws InvalidConfigurationParameterException
     */
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
     * @throws ConstExprEvaluationException
     */
    #[CacheableMethod] public function getConstants(): array
    {
        $constants = [];
        foreach ($this->getConstantsData(true) as $name => $data) {
            $constants[$name] = $this->getConstantValue($name);
        }
        return $constants;
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
        $docRenderer = $this->getPhpHandlerSettings()->getEntityDocRenderersCollection()->getFirstMatchingRender($this);
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
                if (array_key_exists($matches[7], $this->getMethodsData())) {
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
            'm' => $this->getMethodEntity($attributeName)?->getStartLine(),
            'p' => $this->getPropertyEntity($attributeName)?->getStartLine(),
            'q' => $this->getConstantEntity($attributeName)?->getStartLine(),
            default => 0,
        };
        return $line ? "#L{$line}" : '';
    }
}
