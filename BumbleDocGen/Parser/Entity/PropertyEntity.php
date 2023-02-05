<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\Entity;

use BumbleDocGen\ConfigurationInterface;
use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflection\ReflectionProperty;

/**
 * Class property entity
 */
final class PropertyEntity extends BaseEntity
{
    private ?ReflectionProperty $reflectionProperty = null;

    private function __construct(
        protected ConfigurationInterface $configuration,
        protected ClassEntity            $classEntity,
        protected string                 $propertyName,
        protected string                 $declaringClassName,
        protected string                 $implementingClassName,
    )
    {
        parent::__construct($configuration, $classEntity->getReflector(), $classEntity->getAttributeParser());
    }

    public static function create(
        ConfigurationInterface $configuration,
        ClassEntity            $classEntity,
        string                 $propertyName,
        string                 $declaringClassName,
        string                 $implementingClassName,
        bool                   $reloadCache = false
    ): PropertyEntity
    {
        static $classEntities = [];
        $objectId = "{$implementingClassName}:{$propertyName}";
        if (!isset($classEntities[$objectId]) || $reloadCache) {
            $classEntities[$objectId] = new PropertyEntity(
                $configuration, $classEntity, $propertyName, $declaringClassName, $implementingClassName
            );
        }
        return $classEntities[$objectId];
    }

    public function getReflection(): ReflectionProperty
    {
        if (!$this->reflectionProperty) {
            $this->reflectionProperty = $this->classEntity->getReflection()->getProperty($this->propertyName);
        }
        return $this->reflectionProperty;
    }

    public function getImplementingReflectionClass(): ReflectionClass
    {
        return $this->getReflection()->getImplementingClass();
    }

    protected function getDocCommentReflectionRecursive(): ReflectionProperty
    {
        static $docCommentsReflectionCache = [];
        $objectId = $this->getObjectId();
        if (!isset($docCommentsReflectionCache[$objectId])) {
            $getDocCommentReflection = function (ReflectionProperty $reflectionProperty) use (&$getDocCommentReflection
            ): ReflectionProperty {
                $docComment = $reflectionProperty->getDocComment();
                if (!$docComment || str_contains(mb_strtolower($docComment), '@inheritdoc')) {
                    try {
                        $parentClass = $reflectionProperty->getImplementingClass()->getParentClass();
                        $propertyName = $reflectionProperty->getName();
                        if ($parentClass && $parentClass->hasProperty($propertyName)) {
                            $parentReflectionProperty = $parentClass->getProperty($propertyName);
                            $reflectionProperty = $getDocCommentReflection($parentReflectionProperty);
                        }
                    } catch (\Exception $e) {
                        $this->logger->error($e->getMessage());
                    }
                }
                return $reflectionProperty;
            };
            $docCommentsReflectionCache[$objectId] = $getDocCommentReflection($this->getReflection());
        }
        return $docCommentsReflectionCache[$objectId];
    }

    protected function getDocCommentRecursive(): string
    {
        static $docCommentsCache = [];
        $objectId = $this->getObjectId();
        if (!isset($docCommentsCache[$objectId])) {
            $docCommentsCache[$objectId] = $this->getDocCommentReflectionRecursive()->getDocComment() ?: ' ';
        }

        return $docCommentsCache[$objectId];
    }

    public function getName(): string
    {
        return $this->getReflection()->getName();
    }

    public function getFileName(): ?string
    {
        $fullFileName = $this->getReflection()->getImplementingClass()->getFileName();
        if (!str_starts_with($fullFileName, $this->configuration->getProjectRoot())) {
            return null;
        }
        return str_replace(
            $this->configuration->getProjectRoot(),
            '',
            $fullFileName
        );
    }

    public function getLine(): int
    {
        return $this->getReflection()->getStartLine();
    }

    public function getType(): string
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
                    $this->logger->error($e->getMessage());
                }
            }
            if ($typesFromDoc) {
                $typeString = implode('|', $typesFromDoc);
            }
        }
        return $typeString;
    }

    public function getModifiersString(): string
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

    public function isImplementedInParentClass(): bool
    {
        return $this->getImplementingClassName() !== $this->classEntity->getName();
    }

    public function getImplementingClassName(): string
    {
        return $this->implementingClassName;
    }

    public function getDescription(): string
    {
        $docBlock = $this->getDocBlock();
        return trim($docBlock->getSummary());
    }
}
