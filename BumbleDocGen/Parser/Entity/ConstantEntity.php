<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\Entity;

use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflection\ReflectionClassConstant;

/**
 * Class constant entity
 */
final class ConstantEntity extends BaseEntity
{
    private ?ReflectionClassConstant $reflectionClassConstant = null;

    private function __construct(
        protected ClassEntity $classEntity,
        protected string      $constantName,
        protected string      $declaringClassName,
        protected string      $implementingClassName,
    )
    {
        parent::__construct($classEntity->getConfiguration(), $classEntity->getReflector(), $classEntity->getAttributeParser());
    }

    public static function create(
        ClassEntity $classEntity,
        string      $constantName,
        string      $declaringClassName,
        string      $implementingClassName,
        bool        $reloadCache = false
    ): ConstantEntity
    {
        static $classEntities = [];
        $objectId = "{$implementingClassName}:{$constantName}";
        if (!isset($classEntities[$objectId]) || $reloadCache) {
            $classEntities[$objectId] = new ConstantEntity(
                $classEntity, $constantName, $declaringClassName, $implementingClassName
            );
        }
        return $classEntities[$objectId];
    }

    public function getReflection(): ReflectionClassConstant
    {
        if (!$this->reflectionClassConstant) {
            $this->reflectionClassConstant = $this->classEntity->getReflection()->getReflectionConstant($this->constantName);
        }
        return $this->reflectionClassConstant;
    }

    public function getImplementingReflectionClass(): ReflectionClass
    {
        return $this->getReflection()->getDeclaringClass();
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
            $docCommentsCache[$objectId] = $this->getReflection()->getDocComment() ?: ' ';
        }
        return $docCommentsCache[$objectId];
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
