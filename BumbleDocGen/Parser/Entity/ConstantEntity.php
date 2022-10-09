<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\Entity;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Parser\AttributeParser;
use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflection\ReflectionClassConstant;
use Roave\BetterReflection\Reflector\Reflector;

/**
 * Class constant entity
 */
final class ConstantEntity extends BaseEntity
{
    private function __construct(
        protected ConfigurationInterface $configuration,
        protected Reflector $reflector,
        protected ReflectionClass $reflectionClass,
        protected ReflectionClassConstant $reflection,
        protected AttributeParser $attributeParser,
    ) {
        parent::__construct($configuration, $reflector, $attributeParser);
    }

    public static function create(
        ConfigurationInterface $configuration,
        Reflector $reflector,
        ReflectionClass $reflectionClass,
        ReflectionClassConstant $reflectionConstant,
        AttributeParser $attributeParser,
        bool $reloadCache = false
    ): ConstantEntity {
        static $classEntities = [];
        $objectId = self::generateObjectIdByReflection($reflectionConstant) . $reflectionClass->getName();
        if (!isset($classEntities[$objectId]) || $reloadCache) {
            $classEntities[$objectId] = new ConstantEntity(
                $configuration, $reflector, $reflectionClass, $reflectionConstant, $attributeParser
            );
        }
        return $classEntities[$objectId];
    }

    public function getReflection(): ReflectionClassConstant
    {
        return $this->reflection;
    }

    public function getImplementingReflectionClass(): ReflectionClass
    {
        return $this->reflection->getDeclaringClass();
    }

    protected function getDocCommentReflectionRecursive(): ReflectionClassConstant
    {
        return $this->getReflection();
    }

    protected function getDocCommentRecursive(): string
    {
        static $docCommentsCache = [];
        $objectId = $this->getObjectId();
        if (!isset($docCommentsCache[$objectId])) {
            $docCommentsCache[$objectId] = $this->reflection->getDocComment() ?: ' ';
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
                'DocumentationGenerator\Annotations\ConstantDocAnnotation'
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
        $fullFileName = $this->getReflection()->getDeclaringClass()->getFileName();
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

    public function getDescription(): string
    {
        $docBlock = $this->getDocBlock();
        return $docBlock->getSummary();
    }
}
