<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\Entity;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Parser\AttributeParser;
use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflection\ReflectionProperty;
use Roave\BetterReflection\Reflector\Reflector;

/**
 * Class property entity
 */
final class PropertyEntity extends BaseEntity
{

    private function __construct(
        protected ConfigurationInterface $configuration,
        protected Reflector $reflector,
        protected ReflectionClass $reflectionClass,
        protected ReflectionProperty $reflection,
        protected AttributeParser $attributeParser
    ) {
        parent::__construct($configuration, $reflector, $attributeParser);
    }

    public static function create(
        ConfigurationInterface $configuration,
        Reflector $reflector,
        ReflectionClass $reflectionClass,
        ReflectionProperty $reflectionProperty,
        AttributeParser $attributeParser,
        bool $reloadCache = false
    ): PropertyEntity {
        static $classEntities = [];
        $objectId = self::generateObjectIdByReflection($reflectionProperty) . $reflectionClass->getName();
        if (!isset($classEntities[$objectId]) || $reloadCache) {
            $classEntities[$objectId] = new PropertyEntity(
                $configuration, $reflector, $reflectionClass, $reflectionProperty, $attributeParser
            );
        }
        return $classEntities[$objectId];
    }

    public function getReflection(): ReflectionProperty
    {
        return $this->reflection;
    }

    public function getImplementingReflectionClass(): ReflectionClass
    {
        return $this->reflection->getImplementingClass();
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
            $docCommentsReflectionCache[$objectId] = $getDocCommentReflection($this->reflection);
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

    public function getDocAnnotation(): ?object
    {
        static $docAttributesCache = [];
        $objectId = $this->getObjectId();
        if (!isset($docAttributesCache[$objectId])) {
            $docAttributesCache[$objectId] = $this->attributeParser->getAnnotationIfIsSubclassOf(
                $this->reflection->getDocComment(),
                'DocumentationGenerator\Annotations\PropertyDocAnnotation'
            );
        }
        return $docAttributesCache[$objectId];
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
        return $this->getImplementingClassName() !== $this->reflectionClass->getName();
    }

    public function getImplementingClassName(): string
    {
        return $this->getImplementingReflectionClass()->getName();
    }

    public function getDescription(): string
    {
        $docBlock = $this->getDocBlock();
        return trim($docBlock->getSummary());
    }
}
