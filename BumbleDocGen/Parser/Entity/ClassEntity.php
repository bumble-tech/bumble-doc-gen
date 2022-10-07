<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\Entity;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Parser\AttributeParser;
use BumbleDocGen\Render\Context\DocumentTransformableEntityInterface;
use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflector\Reflector;

class ClassEntity extends BaseEntity implements DocumentTransformableEntityInterface
{
    private array $pluginsData = [];

    protected function __construct(
        protected ConfigurationInterface $configuration,
        protected Reflector $reflector,
        protected ReflectionClass $reflection,
        protected AttributeParser $attributeParser,
        protected ConstantEntityCollection $constantEntityCollection,
        protected PropertyEntityCollection $propertyEntityCollection,
        protected MethodEntityCollection $methodEntityCollection,
    ) {
        parent::__construct($configuration, $reflector, $attributeParser);
    }

    public static function create(
        ConfigurationInterface $configuration,
        Reflector $reflector,
        ReflectionClass $reflectionClass,
        AttributeParser $attributeParser,
        bool $reloadCache = false
    ): ClassEntity {
        static $classEntities = [];
        $objectId = static::generateObjectIdByReflection($reflectionClass);
        if (!isset($classEntities[$objectId]) || $reloadCache) {
            $classEntities[$objectId] = new static(
                $configuration,
                $reflector,
                $reflectionClass,
                $attributeParser,
                new ConstantEntityCollection(),
                new PropertyEntityCollection(),
                new MethodEntityCollection()
            );
        }
        return $classEntities[$objectId];
    }

    public function loadClassMembers(): void
    {
        $this->constantEntityCollection = ConstantEntityCollection::createByReflectionClass(
            $this->configuration,
            $this->reflector,
            $this->getReflection(),
            $this->attributeParser
        );
        $this->propertyEntityCollection = PropertyEntityCollection::createByReflectionClass(
            $this->configuration,
            $this->reflector,
            $this->getReflection(),
            $this->attributeParser
        );
        $this->methodEntityCollection = MethodEntityCollection::createByClassEntity(
            $this->configuration,
            $this->reflector,
            $this,
            $this->attributeParser
        );
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
            $docCommentsReflectionCache[$objectId] = $getDocCommentReflection($this->reflection);
        }
        return $docCommentsReflectionCache[$objectId];
    }

    protected function getDocCommentRecursive(): string
    {
        static $docCommentsCache = [];
        $objectId = $this->getObjectId();
        if (!isset($docCommentsCache[$objectId])) {
            $reflectionClass = $this->getDocCommentReflectionRecursive();
            $docCommentsCache[$objectId] = $reflectionClass->getDocComment() ?: ' ';
        }

        return $docCommentsCache[$objectId];
    }

    public function loadPluginData(string $pluginKey, array $data): void
    {
        $this->pluginsData[$pluginKey] = $data;
    }

    public function getPluginData(string $pluginKey): ?array
    {
        return $this->pluginsData[$pluginKey] ?? null;
    }

    public function getDocAnnotation(): ?object
    {
        static $docAttributesCache = [];
        $objectId = $this->getObjectId();
        if (!isset($docAttributesCache[$objectId])) {
            $docAttributesCache[$objectId] = $this->attributeParser->getAnnotationIfIsSubclassOf(
                $this->reflection->getDocComment(),
                'DocumentationGenerator\Annotations\ClassDocAnnotation'
            );
        }
        return $docAttributesCache[$objectId];
    }

    public function getReflection(): ReflectionClass
    {
        return $this->reflection;
    }

    public function getImplementingReflectionClass(): ReflectionClass
    {
        return $this->reflection;
    }

    public function hasAnnotationKey(string $annotationKey): bool
    {
        return false;
    }

    public function getName(): string
    {
        return $this->getReflection()->getName();
    }

    public function getShortName(): string
    {
        return $this->getReflection()->getShortName();
    }

    public function getNamespaceName(): string
    {
        return $this->getReflection()->getNamespaceName();
    }

    public function getFileName(): string
    {
        return str_replace($this->configuration->getProjectRoot(), '', $this->getReflection()->getFileName());
    }

    public function getFilePath(): string
    {
        $shortFileName = array_reverse(explode(DIRECTORY_SEPARATOR, $this->getFileName()))[0];
        return rtrim(str_replace($shortFileName, '', $this->getFileName()), DIRECTORY_SEPARATOR);
    }

    public function getStartLine(): int
    {
        return $this->getReflection()->getStartLine();
    }

    public function getEndLine(): int
    {
        return $this->getReflection()->getEndLine();
    }

    public function getModifiersString(): string
    {
        $modifiersString = [];

        if ($this->getReflection()->isFinal() && !$this->getReflection()->isEnum()) {
            $modifiersString[] = 'final';
        }

        $isInterface = $this->getReflection()->isInterface();
        if ($isInterface) {
            $modifiersString[] = 'interface';
            return implode(' ', $modifiersString);
        } elseif ($this->getReflection()->isAbstract()) {
            $modifiersString[] = 'abstract';
        }

        if ($this->getReflection()->isTrait()) {
            $modifiersString[] = 'trait';
        } elseif ($this->getReflection()->isEnum()) {
            $modifiersString[] = 'enum';
        } else {
            $modifiersString[] = 'class';
        }

        return implode(' ', $modifiersString);
    }

    public function getExtends(): ?string
    {
        $ast = $this->reflection->getAst();
        if (property_exists($ast, 'extends')) {
            if (is_array($ast->extends)) {
                $extends = $ast->extends[0] ?? '';
            } else {
                $extends = $ast->extends;
            }
            return (string)$extends;
        }
        return null;
    }

    public function getInterfaces(): array
    {
        static $interfaces = [];
        $objectId = $this->getObjectId();
        if (!isset($interfaces[$objectId])) {
            $interfaces[$objectId] = $this->reflection->getInterfaceNames();
        }
        return $interfaces[$objectId];
    }

    /**
     * @return string[]
     */
    public function getParentClassNames(): \Generator
    {
        $getParentNamesRecursive = function (ReflectionClass $reflectionClass) use (&$getParentNamesRecursive
        ): \Generator {
            try {
                $parentClass = $reflectionClass->getParentClass();
                if ($parentClass) {
                    yield $parentClass->getName();
                    foreach ($getParentNamesRecursive($parentClass) as $parentName) {
                        yield $parentName;
                    }
                }
            } catch (\Exception $e) {
                $this->logger->error($e->getMessage());
            }
        };
        return $getParentNamesRecursive($this->getReflection());
    }

    public function getInterfacesString(): string
    {
        return implode(', ', $this->getInterfaces());
    }

    public function getTraitsNames(): array
    {
        static $traits = [];
        $objectId = $this->getObjectId();
        if (!isset($traits[$objectId])) {
            $ast = $this->reflection->getAst();
            $traits[$objectId] = [];
            if (property_exists($ast, 'stmts')) {
                foreach ($ast->stmts as $stmt) {
                    if (property_exists($stmt, 'traits')) {
                        $traits[$objectId] += $stmt->traits;
                    }
                }
                $traits[$objectId] = array_unique($traits[$objectId]);
            }
        }
        return $traits[$objectId];
    }

    public function hasTraits(): bool
    {
        return count($this->getTraitsNames()) > 0;
    }

    public function getConstantEntityCollection(): ConstantEntityCollection
    {
        return $this->constantEntityCollection;
    }

    public function getPropertyEntityCollection(): PropertyEntityCollection
    {
        return $this->propertyEntityCollection;
    }

    public function getMethodEntityCollection(): MethodEntityCollection
    {
        return $this->methodEntityCollection;
    }

    public function getDescription(): string
    {
        $docBlock = $this->getDocBlock();
        return $docBlock->getSummary();
    }

    public function isEnum(): bool
    {
        return $this->reflection->isEnum();
    }
}
