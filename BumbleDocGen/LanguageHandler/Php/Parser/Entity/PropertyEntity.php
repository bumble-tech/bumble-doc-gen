<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity;

use BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper;
use BumbleDocGen\Core\Parser\Entity\Cache\CacheableMethod;
use phpDocumentor\Reflection\DocBlock;
use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflection\ReflectionProperty;

/**
 * Class property entity
 */
class PropertyEntity extends BaseEntity
{
    private ?ReflectionProperty $reflectionProperty = null;

    private function __construct(
        protected ClassEntity $classEntity,
        protected string      $propertyName,
        protected string      $declaringClassName,
        protected string      $implementingClassName,
    )
    {
        parent::__construct($classEntity->getConfiguration(), $classEntity->getReflector());
    }

    public static function create(
        ClassEntity $classEntity,
        string      $propertyName,
        string      $declaringClassName,
        string      $implementingClassName,
        bool        $reloadCache = false
    ): PropertyEntity
    {
        static $classEntities = [];
        $objectId = "{$classEntity->getName()}:{$propertyName}";
        if (!isset($classEntities[$objectId]) || $reloadCache) {
            $classEntities[$objectId] = new static(
                $classEntity, $propertyName, $declaringClassName, $implementingClassName
            );
        }
        return $classEntities[$objectId];
    }

    public function getRootEntity(): ClassEntity
    {
        return $this->classEntity;
    }

    public function getEntityDependencies(): array
    {
        return $this->getRootEntity()->getEntityDependencies();
    }

    public function getReflection(): ReflectionProperty
    {
        if (!$this->reflectionProperty) {
            $this->reflectionProperty = $this->classEntity->getReflection()->getProperty($this->propertyName);
        }
        return $this->reflectionProperty;
    }

    public function getRootEntityCollection(): ClassEntityCollection
    {
        return $this->getRootEntity()->getRootEntityCollection();
    }

    #[CacheableMethod] public function getDocBlock(): DocBlock
    {
        $classEntity = $this->getDocCommentEntity()->getImplementingClass();
        return ParserHelper::getDocBlock($classEntity, $this->getDocCommentRecursive());
    }

    public function getImplementingReflectionClass(): ReflectionClass
    {
        return $this->getReflection()->getImplementingClass();
    }

    protected function getDocCommentEntity(): PropertyEntity
    {
        static $docCommentsReflectionCache = [];
        $objectId = $this->getObjectId();
        if (!isset($docCommentsReflectionCache[$objectId])) {
            $docComment = $this->getDocComment();
            $reflectionProperty = $this;
            if (!$docComment || str_contains(mb_strtolower($docComment), '@inheritdoc')) {
                $implementingClass = $this->getImplementingClass();
                $parentClass = $this->getImplementingClass()->getParentClass();
                $propertyName = $this->getName();
                if ($parentClass && $parentClass->hasProperty($propertyName)) {
                    $parentReflectionProperty = $parentClass->getPropertyEntity($propertyName);
                    $reflectionProperty = $parentReflectionProperty->getDocCommentEntity();
                } else {
                    foreach ($implementingClass->getInterfacesEntities() as $interface) {
                        if ($interface->hasProperty($propertyName)) {
                            $reflectionProperty = $interface->getPropertyEntity($propertyName);
                            break;
                        }
                    }
                }
            }
            $docCommentsReflectionCache[$objectId] = $reflectionProperty;
        }
        return $docCommentsReflectionCache[$objectId];
    }

    #[CacheableMethod] protected function getDocCommentRecursive(): string
    {
        static $docCommentsCache = [];
        $objectId = $this->getObjectId();
        if (!isset($docCommentsCache[$objectId])) {
            $docCommentsCache[$objectId] = $this->getDocCommentEntity()->getDocComment() ?: ' ';
        }

        return $docCommentsCache[$objectId];
    }

    public function getName(): string
    {
        return $this->propertyName;
    }

    public function getShortName(): string
    {
        return $this->getName();
    }

    public function getNamespaceName(): string
    {
        return $this->getRootEntity()->getNamespaceName();
    }

    public function getImplementingClassName(): string
    {
        return $this->implementingClassName;
    }

    public function getImplementingClass(): ClassEntity
    {
        return $this->getRootEntityCollection()->getLoadedOrCreateNew($this->getImplementingClassName());
    }

    #[CacheableMethod] public function getFileName(): ?string
    {
        $fullFileName = $this->getReflection()->getImplementingClass()->getFileName();
        if (!$fullFileName) {
            return null;
        }
        return str_replace(
            $this->configuration->getProjectRoot(),
            '',
            $fullFileName
        );
    }

    #[CacheableMethod] public function getType(): string
    {
        $type = $this->getReflection()->getType();
        $typeString = 'mixed';
        if ($type) {
            $typeString = (string)$type;
        } else {
            $docBlock = $this->getDocBlock();
            $typesFromDoc = [];
            foreach ($docBlock->getTagsByName('var') as $param) {
                try {
                    $typesFromDoc[] = (string)$param->getType();
                } catch (\Exception $e) {
                    $this->getLogger()->error($e->getMessage());
                }
            }
            if ($typesFromDoc) {
                $typeString = implode('|', $typesFromDoc);
            }
        }
        return $this->prepareTypeString($typeString);
    }

    #[CacheableMethod] public function getModifiersString(): string
    {
        $modifiersString = [];
        if ($this->getReflection()->isPrivate()) {
            $modifiersString[] = 'private';
        } elseif ($this->getReflection()->isProtected()) {
            $modifiersString[] = 'protected';
        } elseif ($this->getReflection()->isPublic()) {
            $modifiersString[] = 'public';
        }

        if ($this->getReflection()->isStatic()) {
            $modifiersString[] = 'static';
        } elseif ($this->getReflection()->isReadOnly()) {
            $modifiersString[] = 'readonly';
        }

        $modifiersString[] = $this->getType();
        return implode(' ', $modifiersString);
    }

    #[CacheableMethod] public function isImplementedInParentClass(): bool
    {
        return $this->getImplementingClassName() !== $this->classEntity->getName();
    }

    #[CacheableMethod] public function getDescription(): string
    {
        $docBlock = $this->getDocBlock();
        return trim($docBlock->getSummary());
    }

    #[CacheableMethod] public function isPublic(): bool
    {
        return $this->getReflection()->isPublic();
    }

    #[CacheableMethod] public function isProtected(): bool
    {
        return $this->getReflection()->isProtected();
    }

    #[CacheableMethod] public function isPrivate(): bool
    {
        return $this->getReflection()->isPrivate();
    }

    #[CacheableMethod] public function getStartLine(): int
    {
        return $this->getReflection()->getStartLine();
    }

    #[CacheableMethod] public function getEndLine(): int
    {
        return $this->getReflection()->getEndLine();
    }

    #[CacheableMethod] public function getDefaultValue(): string|array|int|bool|null|float
    {
        return $this->getReflection()->getDefaultValue();
    }
}
