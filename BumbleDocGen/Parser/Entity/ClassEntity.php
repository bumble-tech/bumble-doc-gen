<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\Entity;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Parser\ParserHelper;
use BumbleDocGen\Render\Context\DocumentTransformableEntityInterface;
use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflector\Reflector;

/**
 * Class entity
 */
class ClassEntity extends BaseEntity implements DocumentTransformableEntityInterface
{
    private array $pluginsData = [];
    private ?ReflectionClass $reflectionClass = null;
    private bool $relativeFileNameLoaded = false;
    private bool $isClassLoad = false;

    protected function __construct(
        protected ConfigurationInterface $configuration,
        protected Reflector              $reflector,
        protected string                 $className,
        protected ?string                $relativeFileName,
    )
    {
        parent::__construct($configuration, $reflector);
        if ($relativeFileName) {
            $this->relativeFileNameLoaded = true;
        }
    }

    public function getObjectId(): string
    {
        return $this->className;
    }

    public static function create(
        ConfigurationInterface $configuration,
        Reflector              $reflector,
        string                 $className,
        ?string                $relativeFileName,
        bool                   $reloadCache = false
    ): ClassEntity
    {
        static $classEntities = [];
        $className = ltrim(str_replace('\\\\', '\\', $className), '\\');
        $objectId = md5($className);
        if (!isset($classEntities[$objectId]) || $reloadCache) {
            $classEntities[$objectId] = new static(
                $configuration,
                $reflector,
                $className,
                $relativeFileName,
            );
        }
        return $classEntities[$objectId];
    }

    public static function createByReflection(
        ConfigurationInterface $configuration,
        Reflector              $reflector,
        ReflectionClass        $reflectionClass,
        bool                   $reloadCache = false
    ): ClassEntity
    {
        static $classEntities = [];
        $objectId = static::generateObjectIdByReflection($reflectionClass);
        if (!isset($classEntities[$objectId]) || $reloadCache) {
            $relativeFileName = $reflectionClass->getFileName() ? str_replace($configuration->getProjectRoot(), '', $reflectionClass->getFileName()) : null;
            $classEntities[$objectId] = new static(
                $configuration,
                $reflector,
                $reflectionClass->getName(),
                $relativeFileName,
            );
            $classEntities[$objectId]->reflectionClass = $reflectionClass;
            $classEntities[$objectId]->isClassLoad = true;
        }
        return $classEntities[$objectId];
    }

    public function getReflector(): Reflector
    {
        return $this->reflector;
    }

    /**
     * Checking if class file is in git repository
     */
    public function isInGit(): bool
    {
        $filesInGit = ParserHelper::getFilesInGit($this->getConfiguration());
        $fileName = ltrim($this->getFileName(), DIRECTORY_SEPARATOR);
        return isset($filesInGit[$fileName]);
    }

    protected function getDocCommentReflectionRecursive(): ReflectionClass
    {
        static $docCommentsReflectionCache = [];
        $objectId = $this->getObjectId();
        if (!isset($docCommentsReflectionCache[$objectId])) {
            $getDocCommentReflection = function (ReflectionClass $reflectionClass) use (&$getDocCommentReflection
            ): ReflectionClass {
                $docComment = $reflectionClass->getDocComment();
                if (!$docComment || str_contains(mb_strtolower($docComment), '@inheritdoc')) {
                    try {
                        $parentReflectionClass = $reflectionClass->getParentClass();
                        if ($parentReflectionClass) {
                            $reflectionClass = $getDocCommentReflection($parentReflectionClass);
                        }
                    } catch (\Exception $e) {
                        $this->getLogger()->error($e->getMessage());
                    }
                }
                return $reflectionClass;
            };
            $docCommentsReflectionCache[$objectId] = $getDocCommentReflection($this->getReflection());
        }
        return $docCommentsReflectionCache[$objectId];
    }

    #[Cache\CacheableMethod] protected function getDocCommentRecursive(): string
    {
        $reflectionClass = $this->getDocCommentReflectionRecursive();
        return $reflectionClass->getDocComment() ?: ' ';
    }

    public function loadPluginData(string $pluginKey, array $data): void
    {
        $this->pluginsData[$pluginKey] = $data;
    }

    public function getPluginData(string $pluginKey): ?array
    {
        return $this->pluginsData[$pluginKey] ?? null;
    }

    public function getReflection(): ReflectionClass
    {
        if (!$this->reflectionClass) {
            $this->reflectionClass = $this->reflector->reflectClass($this->className);
        }
        return $this->reflectionClass;
    }

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
            $this->isClassLoad = ParserHelper::isClassLoaded($this->reflector, $this->getName());
        }
        return $this->isClassLoad;
    }

    /**
     * Checking if it is possible to get the entity data ( is the specified class loaded )
     */
    #[Cache\CacheableMethod] public function classDataCanBeLoaded(): bool
    {
        return $this->isClassLoad();
    }

    #[Cache\CacheableMethod] public function getShortName(): string
    {
        return $this->getReflection()->getShortName();
    }

    #[Cache\CacheableMethod] public function getNamespaceName(): string
    {
        return $this->getReflection()->getNamespaceName();
    }

    #[Cache\CacheableMethod] public function getFileName(): ?string
    {
        if (!$this->relativeFileNameLoaded) {
            $this->relativeFileNameLoaded = true;
            $fileName = $this->getReflection()->getFileName();
            $projectRoot = $this->getConfiguration()->getProjectRoot();
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

    #[Cache\CacheableMethod] public function getStartLine(): int
    {
        return $this->getReflection()->getStartLine();
    }

    #[Cache\CacheableMethod] public function getEndLine(): int
    {
        return $this->getReflection()->getEndLine();
    }

    #[Cache\CacheableMethod] public function getModifiersString(): string
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

    #[Cache\CacheableMethod] public function getExtends(): ?string
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

    #[Cache\CacheableMethod] public function getInterfaces(): array
    {
        $reflection = $this->getReflection();
        return !$reflection->isInterface() ? array_map(fn($interfaceName) => "\\{$interfaceName}", $reflection->getInterfaceNames()) : [];
    }

    /**
     * @return string[]
     */
    #[Cache\CacheableMethod] public function getParentClassNames(): array
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
     */
    #[Cache\CacheableMethod] public function getInterfaceNames(): array
    {
        return $this->getReflection()->getInterfaceNames();
    }

    #[Cache\CacheableMethod] public function getParentClassName(): ?string
    {
        return $this->getReflection()->getParentClass()?->getName();
    }

    public function getParentClass(ClassEntityCollection $classEntityPool): ?ClassEntity
    {
        $parentClassName = $this->getParentClassName();
        if (!$parentClassName) {
            return null;
        }
        return $classEntityPool->getLoadedOrCreateNew($parentClassName);
    }

    #[Cache\CacheableMethod] public function getInterfacesString(): string
    {
        return implode(', ', $this->getInterfaces());
    }

    #[Cache\CacheableMethod] public function getTraitsNames(): array
    {
        return $this->getReflection()->getTraitNames();
    }

    #[Cache\CacheableMethod] public function hasTraits(): bool
    {
        return count($this->getTraitsNames()) > 0;
    }

    public function getConstantEntityCollection(): ConstantEntityCollection
    {
        static $constantEntityCollection = [];
        if (!isset($constantEntityCollection[$this->getObjectId()])) {
            $constantEntityCollection[$this->getObjectId()] = ConstantEntityCollection::createByClassEntity($this);
        }
        return $constantEntityCollection[$this->getObjectId()];
    }

    public function getConstantEntity(string $constantName, bool $unsafe = true): ?ConstantEntity
    {
        $constantEntityCollection = $this->getConstantEntityCollection();
        if ($unsafe) {
            return $constantEntityCollection->unsafeGet($constantName);
        }
        return $constantEntityCollection->get($constantName);
    }

    public function getPropertyEntityCollection(): PropertyEntityCollection
    {
        static $propertyEntityCollection = [];
        if (!isset($propertyEntityCollection[$this->getObjectId()])) {
            $propertyEntityCollection[$this->getObjectId()] = PropertyEntityCollection::createByClassEntity($this);
        }
        return $propertyEntityCollection[$this->getObjectId()];
    }

    public function getPropertyEntity(string $propertyName, bool $unsafe = true): ?PropertyEntity
    {
        $propertyEntityCollection = $this->getPropertyEntityCollection();
        if ($unsafe) {
            return $propertyEntityCollection->unsafeGet($propertyName);
        }
        return $propertyEntityCollection->get($propertyName);
    }

    public function getMethodEntityCollection(): MethodEntityCollection
    {
        static $methodEntityCollection = [];
        if (!isset($methodEntityCollection[$this->getObjectId()])) {
            $methodEntityCollection[$this->getObjectId()] = MethodEntityCollection::createByClassEntity($this);
        }
        return $methodEntityCollection[$this->getObjectId()];
    }

    public function getMethodEntity(string $methodName, bool $unsafe = true): ?MethodEntity
    {
        $methodEntityCollection = $this->getMethodEntityCollection();
        if ($unsafe) {
            return $methodEntityCollection->unsafeGet($methodName);
        }
        return $methodEntityCollection->get($methodName);
    }

    #[Cache\CacheableMethod] public function getDescription(): string
    {
        $docBlock = $this->getDocBlock();
        return $docBlock->getSummary();
    }

    #[Cache\CacheableMethod] public function isEnum(): bool
    {
        return $this->getReflection()->isEnum();
    }

    #[Cache\CacheableMethod] public function getCasesNames(): array
    {
        $caseNames = [];
        if ($this->isEnum()) {
            foreach ($this->getReflection()->getCases() as $case) {
                $caseNames[] = $case->getName();
            }
        }
        return $caseNames;
    }

    /**
     * Returns the absolute path to a file if it can be retrieved and if the file is in the project directory
     */
    public function getAbsoluteFileName(): ?string
    {
        $relativeFileName = $this->getFileName();
        return $relativeFileName ? $this->configuration->getProjectRoot() . $relativeFileName : null;
    }

    public function getFileContent(): string
    {
        return file_get_contents($this->getAbsoluteFileName());
    }

    #[Cache\CacheableMethod] public function getMethodsData(): array
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

    #[Cache\CacheableMethod] public function getPropertiesData(): array
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

    #[Cache\CacheableMethod] public function getConstantsData(): array
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

    #[Cache\CacheableMethod] public function isInstantiable(): bool
    {
        return $this->getReflection()->isInstantiable();
    }

    #[Cache\CacheableMethod] public function isInterface(): bool
    {
        return $this->getReflection()->isInterface();
    }

    #[Cache\CacheableMethod] public function hasMethod(string $method): bool
    {
        return array_key_exists($method, $this->getMethodsData());
    }

    #[Cache\CacheableMethod] public function hasProperty(string $property): bool
    {
        return array_key_exists($property, $this->getPropertiesData());
    }

    #[Cache\CacheableMethod] public function hasConstant(string $constant): bool
    {
        return array_key_exists($constant, $this->getConstantsData());
    }

    #[Cache\CacheableMethod] public function isSubclassOf(string $className): bool
    {
        $className = ltrim(str_replace('\\\\', '\\', $className), '\\');

        $parentClassNames = $this->getParentClassNames();
        $interfacesNames = $this->getInterfaces();
        $allClasses = array_map(
            fn($interface) => ltrim($interface, '\\'), array_merge($parentClassNames, $interfacesNames)
        );
        return in_array($className, $allClasses);
    }

    #[Cache\CacheableMethod] public function getConstant(string $name): string|array|int|bool|null|float
    {
        return $this->getReflection()->getConstant($name);
    }

    #[Cache\CacheableMethod] public function implementsInterface(string $interfaceName): bool
    {
        $interfaceName = ltrim(str_replace('\\\\', '\\', $interfaceName), '\\');
        $interfaces = array_map(
            fn($interface) => ltrim($interface, '\\'), $this->getInterfaces()
        );
        return in_array($interfaceName, $interfaces);
    }

    #[Cache\CacheableMethod] public function getConstants(): array
    {
        return $this->getReflection()->getImmediateConstants();
    }
}
