<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\Entity;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Parser\AttributeParser;
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

    protected function __construct(
        protected ConfigurationInterface $configuration,
        protected Reflector              $reflector,
        protected string                 $className,
        protected ?string                $relativeFileName,
        protected AttributeParser        $attributeParser
    )
    {
        parent::__construct($configuration, $reflector, $attributeParser);
    }

    public function getObjectId(): string
    {
        return $this->className;
    }

    public static function create(
        ConfigurationInterface $configuration,
        Reflector              $reflector,
        string                 $className,
        string                 $relativeFileName,
        AttributeParser        $attributeParser,
        bool                   $reloadCache = false
    ): ClassEntity
    {
        static $classEntities = [];
        $objectId = md5($relativeFileName);
        if (!isset($classEntities[$objectId]) || $reloadCache) {
            $classEntities[$objectId] = new static(
                $configuration,
                $reflector,
                $className,
                $relativeFileName,
                $attributeParser
            );
        }
        return $classEntities[$objectId];
    }

    public static function createByReflection(
        ConfigurationInterface $configuration,
        Reflector              $reflector,
        ReflectionClass        $reflectionClass,
        AttributeParser        $attributeParser,
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
                $attributeParser
            );
            $classEntities[$objectId]->reflectionClass = $reflectionClass;
        }
        return $classEntities[$objectId];
    }

    public function getReflector(): Reflector
    {
        return $this->reflector;
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
                        $this->logger->error($e->getMessage());
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
            return $reflection->getInterfaceNames()[0] ?? null;
        }
        return $reflection->getParentClass()?->getName();
    }

    #[Cache\CacheableMethod] public function getInterfaces(): array
    {
        $reflection = $this->getReflection();
        return !$reflection->isInterface() ? $reflection->getInterfaceNames() : [];
    }

    /**
     * @return string[]
     */
    #[Cache\CacheableMethod] public function getParentClassNames(): array
    {
        $reflection = $this->getReflection();
        if ($reflection->isInterface()) {
            return $reflection->getInterfaceNames();
        }
        return $reflection->getParentClassNames();
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

    public function getPropertyEntityCollection(): PropertyEntityCollection
    {
        static $propertyEntityCollection = [];
        if (!isset($propertyEntityCollection[$this->getObjectId()])) {
            $propertyEntityCollection[$this->getObjectId()] = PropertyEntityCollection::createByClassEntity($this);
        }
        return $propertyEntityCollection[$this->getObjectId()];
    }

    public function getMethodEntityCollection(): MethodEntityCollection
    {
        static $methodEntityCollection = [];
        if (!isset($methodEntityCollection[$this->getObjectId()])) {
            $methodEntityCollection[$this->getObjectId()] = MethodEntityCollection::createByClassEntity($this);
        }
        return $methodEntityCollection[$this->getObjectId()];
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

    public function getAbsoluteFileName(): ?string
    {

        return $this->relativeFileName ? $this->configuration->getProjectRoot() . $this->relativeFileName : null;
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
}
