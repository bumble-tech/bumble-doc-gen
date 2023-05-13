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
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Reflection\ReflectorWrapper;
use BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper;
use BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings;
use BumbleDocGen\LanguageHandler\Php\Plugin\Event\Entity\OnCheckIsClassEntityCanBeLoad;
use DI\Attribute\Inject;
use DI\Container;
use DI\DependencyException;
use DI\NotFoundException;
use phpDocumentor\Reflection\DocBlock;
use Psr\Log\LoggerInterface;
use Roave\BetterReflection\BetterReflection;
use Roave\BetterReflection\Identifier\Identifier;
use Roave\BetterReflection\Identifier\IdentifierType;
use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\SourceLocator\Located\LocatedSource;

/**
 * Class entity
 */
class ClassEntity extends BaseEntity implements DocumentTransformableEntityInterface, RootEntityInterface
{
    #[Inject] private Container $diContainer;

    private array $pluginsData = [];
    private ?ReflectionClass $reflectionClass = null;
    private bool $relativeFileNameLoaded = false;
    private bool $isClassLoad = false;

    public function __construct(
        private Configuration         $configuration,
        private PhpHandlerSettings    $phpHandlerSettings,
        private ReflectorWrapper      $reflector,
        private ClassEntityCollection $classEntityCollection,
        private ParserHelper          $parserHelper,
        private LocalObjectCache      $localObjectCache,
        private LoggerInterface       $logger,
        private string                $className,
        private ?string               $relativeFileName,
    )
    {
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

    public function setReflectionClass(ReflectionClass $reflectionClass): void
    {
        $this->reflectionClass = $reflectionClass;
        $this->isClassLoad = true;
    }

    public function getReflector(): ReflectorWrapper
    {
        return $this->reflector;
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
     * @throws ReflectionException
     */
    public function getEntityDependencies(): array
    {
        $fileDependencies = [];
        if ($this->isClassLoad()) {
            $currentClassEntityReflection = $this->getReflection();
            $parentClassNames = $currentClassEntityReflection->getParentClassNames();
            $traitClassNames = $currentClassEntityReflection->getTraitNames();
            $interfaceNames = $currentClassEntityReflection->getInterfaceNames();

            $classNames = array_unique(array_merge($parentClassNames, $traitClassNames, $interfaceNames));

            $reflections = array_map(fn($className) => $this->getReflector()->reflectClass($className), $classNames);
            $reflections[] = $currentClassEntityReflection;
            foreach ($reflections as $reflectionClass) {
                $fileName = $reflectionClass->getFileName();
                if ($fileName) {
                    $relativeFileName = str_replace($this->configuration->getProjectRoot(), '', $reflectionClass->getFileName());
                    $fileDependencies[$relativeFileName] = md5_file($fileName);
                }
            }
        }
        return $fileDependencies;
    }

    /**
     * @throws NotFoundException
     * @throws ReflectionException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getDocBlock(): DocBlock
    {
        $classEntity = $this->getDocCommentEntity();
        return $this->parserHelper->getDocBlock($classEntity, $this->getDocCommentRecursive());
    }

    /**
     * Checking if class file is in git repository
     *
     * @throws InvalidConfigurationParameterException
     * @throws ReflectionException
     */
    public function isInGit(): bool
    {
        if (!$this->getFileName()) {
            return false;
        }
        $filesInGit = $this->parserHelper->getFilesInGit();
        $fileName = ltrim($this->getFileName(), DIRECTORY_SEPARATOR);
        return isset($filesInGit[$fileName]);
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    public function documentCreationAllowed(): bool
    {
        return !$this->configuration->isCheckFileInGitBeforeCreatingDocEnabled() || $this->isInGit();
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws ReflectionException
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
            if ($parentReflectionClass) {
                $classEntity = $parentReflectionClass->getDocCommentEntity();
            }
        }
        $this->localObjectCache->cacheMethodResult(__METHOD__, $objectId, $classEntity);
        return $classEntity;
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] protected function getDocCommentRecursive(): string
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

    /**
     * {@inheritDoc}
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    protected function getReflection(): ReflectionClass
    {
        if ($this->reflectionClass) {
            return $this->reflectionClass;
        }
        $objectId = $this->getObjectId();
        try {
            $this->reflectionClass = $this->localObjectCache->getMethodCachedResult(__METHOD__, $objectId);
            return $this->reflectionClass;
        } catch (ObjectNotFoundException) {
        }
        if (!$this->reflectionClass) {
            try {
                $this->reflectionClass = $this->reflector->reflectClass($this->className);
            } catch (\Exception) {
            }
            if (!$this->reflectionClass && $this->relativeFileNameLoaded && $this->getName()) {
                $locatedSource = new LocatedSource(
                    $this->getFileContent(),
                    $this->getName(),
                    $this->getAbsoluteFileName()
                );
                /**
                 * @var ReflectionClass $reflectionClass
                 */
                $reflectionClass = (new BetterReflection())->astLocator()->findReflection(
                    $this->getReflector(),
                    $locatedSource,
                    new Identifier($this->getName(), new IdentifierType(IdentifierType::IDENTIFIER_CLASS)),
                );
                $this->reflectionClass = $reflectionClass;
            }
        }
        if (!$this->reflectionClass) {
            throw new ReflectionException("'{$this->className}' could not be found in the located source ");
        }
        $this->localObjectCache->cacheMethodResult(__METHOD__, $objectId, $this->reflectionClass);
        return $this->reflectionClass;
    }


    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    public function getImplementingReflectionClass(): ReflectionClass
    {
        return $this->getReflection();
    }

    public function hasAnnotationKey(string $annotationKey): bool
    {
        return false;
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
                $this->isClassLoad = ParserHelper::isCorrectClassName($this->getName()) && $this->getReflection();
            } catch (\Exception) {
                $this->isClassLoad = false;
            }
        }
        return $this->isClassLoad;
    }

    #[CacheableMethod] public function entityDataCanBeLoaded(): bool
    {
        if (!$this->getRootEntityCollection()->getPluginEventDispatcher()->dispatch(
            new OnCheckIsClassEntityCanBeLoad($this)
        )->isClassCanBeLoad()) {
            $this->logger->notice("Class {$this->getName()} skipped by plugin");
            return false;
        }
        return $this->isClassLoad();
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getShortName(): string
    {
        return $this->getReflection()->getShortName();
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getNamespaceName(): string
    {
        return $this->getReflection()->getNamespaceName();
    }

    /**
     * {@inheritDoc}
     * @throws InvalidConfigurationParameterException
     * @throws ReflectionException
     */
    #[CacheableMethod] public function getFileName(): ?string
    {
        if (!$this->relativeFileNameLoaded) {
            $this->relativeFileNameLoaded = true;
            $fileName = $this->getReflection()->getFileName();
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
     * @throws ReflectionException
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
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getStartLine(): int
    {
        return $this->getReflection()->getStartLine();
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getEndLine(): int
    {
        return $this->getReflection()->getEndLine();
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getModifiersString(): string
    {
        $modifiersString = [];

        $reflection = $this->getReflection();
        if ($reflection->isFinal() && !$reflection->isEnum()) {
            $modifiersString[] = 'final';
        }

        $isInterface = $reflection->isInterface();
        if ($isInterface) {
            $modifiersString[] = 'interface';
            return implode(' ', $modifiersString);
        } elseif ($reflection->isAbstract()) {
            $modifiersString[] = 'abstract';
        }

        if ($reflection->isTrait()) {
            $modifiersString[] = 'trait';
        } elseif ($reflection->isEnum()) {
            $modifiersString[] = 'enum';
        } else {
            $modifiersString[] = 'class';
        }

        return implode(' ', $modifiersString);
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getExtends(): ?string
    {
        $reflection = $this->getReflection();
        if ($reflection->isInterface()) {
            $extends = $reflection->getInterfaceNames()[0] ?? null;
        } else {
            $extends = $reflection->getParentClass()?->getName();
        }
        if ($extends) {
            $extends = "\\{$extends}";
        }
        return $extends;
    }


    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getInterfaces(): array
    {
        $reflection = $this->getReflection();
        return !$reflection->isInterface() ? array_map(fn($interfaceName) => "\\{$interfaceName}", $reflection->getInterfaceNames()) : [];
    }


    /**
     * @return ClassEntity[]
     *
     * @throws NotFoundException
     * @throws ReflectionException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    public function getInterfacesEntities(): array
    {
        $interfacesEntities = [];
        foreach ($this->getInterfaces() as $interfaceClassName) {
            $interfacesEntities[] = $this->getRootEntityCollection()->getLoadedOrCreateNew($interfaceClassName);
        }
        return $interfacesEntities;
    }

    /**
     * @return string[]
     *
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getParentClassNames(): array
    {
        $reflection = $this->getReflection();
        if ($reflection->isInterface()) {
            $parentClassNames = $reflection->getInterfaceNames();
        } else {
            $parentClassNames = $reflection->getParentClassNames();
        }
        return array_map(fn($parentClassName) => "\\{$parentClassName}", $parentClassNames);
    }


    /**
     * @return string[]
     *
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getInterfaceNames(): array
    {
        return $this->getReflection()->getInterfaceNames();
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getParentClassName(): ?string
    {
        return $this->getReflection()->getParentClass()?->getName();
    }

    /**
     * @throws NotFoundException
     * @throws ReflectionException
     * @throws DependencyException
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
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getInterfacesString(): string
    {
        return implode(', ', $this->getInterfaces());
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getTraitsNames(): array
    {
        return $this->getReflection()->getTraitNames();
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function hasTraits(): bool
    {
        return count($this->getTraitsNames()) > 0;
    }

    /**
     * @throws NotFoundException
     * @throws ReflectionException
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
     * @throws ReflectionException
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
     * @throws ReflectionException
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
     * @throws ReflectionException
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
     * @throws ReflectionException
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
     * @throws ReflectionException
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
     * @throws ReflectionException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getDescription(): string
    {
        $docBlock = $this->getDocBlock();
        return $docBlock->getSummary();
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function isEnum(): bool
    {
        return $this->getReflection()->isEnum();
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getCasesNames(): array
    {
        $caseNames = [];
        if ($this->isEnum()) {
            foreach ($this->getReflection()->getCases() as $case) {
                $caseNames[] = $case->getName();
            }
        }
        return $caseNames;
    }

    #[CacheableMethod] public function getFileContent(): string
    {
        return $this->getAbsoluteFileName() ? file_get_contents($this->getAbsoluteFileName()) : '';
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getMethodsData(): array
    {
        $methods = [];
        foreach ($this->getReflection()->getMethods() as $method) {
            $name = $method->getName();
            $methods[$name] = [
                'declaringClass' => $method->getDeclaringClass()->getName(),
                'implementingClass' => $method->getImplementingClass()->getName()
            ];
        }
        return $methods;
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getPropertiesData(): array
    {
        $properties = [];
        foreach ($this->getReflection()->getProperties() as $property) {
            $name = $property->getName();
            $properties[$name] = [
                'declaringClass' => $property->getDeclaringClass()->getName(),
                'implementingClass' => $property->getImplementingClass()->getName()
            ];
        }
        return $properties;
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getConstantsData(): array
    {
        $constants = [];
        foreach ($this->getReflection()->getReflectionConstants() as $constant) {
            $name = $constant->getName();
            $constants[$name] = [
                'declaringClass' => $constant->getDeclaringClass()->getName(),
                'implementingClass' => $constant->getDeclaringClass()->getName()
            ];
        }
        return $constants;
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function isInstantiable(): bool
    {
        return $this->getReflection()->isInstantiable();
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function isInterface(): bool
    {
        return $this->getReflection()->isInterface();
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function hasMethod(string $method): bool
    {
        return array_key_exists($method, $this->getMethodsData());
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function hasProperty(string $property): bool
    {
        return array_key_exists($property, $this->getPropertiesData());
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function hasConstant(string $constant): bool
    {
        return array_key_exists($constant, $this->getConstantsData());
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function isSubclassOf(string $className): bool
    {
        $className = ltrim(str_replace('\\\\', '\\', $className), '\\');

        $parentClassNames = $this->getParentClassNames();
        $interfacesNames = $this->getInterfaces();
        $allClasses = array_map(
            fn($interface) => ltrim($interface, '\\'), array_merge($parentClassNames, $interfacesNames)
        );
        return in_array($className, $allClasses);
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getConstant(string $name): string|array|int|bool|null|float
    {
        return $this->getReflection()->getConstant($name);
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function implementsInterface(string $interfaceName): bool
    {
        $interfaceName = ltrim(str_replace('\\\\', '\\', $interfaceName), '\\');
        $interfaces = array_map(
            fn($interface) => ltrim($interface, '\\'), $this->getInterfaces()
        );
        return in_array($interfaceName, $interfaces);
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getConstants(): array
    {
        return $this->getReflection()->getImmediateConstants();
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
     * @throws ReflectionException
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public function cursorToDocAttributeLinkFragment(string $cursor, bool $isForDocument = true): string
    {
        if (!$cursor || !preg_match(
                '/^(((\$)(([a-zA-Z_])([a-zA-Z_0-9]+)))|(([a-zA-Z_])([a-zA-Z_0-9]+))|((([a-zA-Z_])([a-zA-Z_0-9]+))\(\)))$/',
                $cursor,
                $matches,
                PREG_UNMATCHED_AS_NULL
            )) {
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
