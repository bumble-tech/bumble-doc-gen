<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity;

use BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper;
use BumbleDocGen\Core\Parser\Entity\Cache\CacheableMethod;
use BumbleDocGen\LanguageHandler\Php\PhpHandlerSettingsInterface;
use phpDocumentor\Reflection\DocBlock;
use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflection\ReflectionClassConstant;

/**
 * Class constant entity
 */
class ConstantEntity extends BaseEntity
{
    private ?ReflectionClassConstant $reflectionClassConstant = null;

    private function __construct(
        protected ClassEntity $classEntity,
        protected string      $constantName,
        protected string      $declaringClassName,
        protected string      $implementingClassName,
    )
    {
        parent::__construct($classEntity->getConfiguration(), $classEntity->getReflector());
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
        $objectId = "{$classEntity->getName()}:{$constantName}";
        if (!isset($classEntities[$objectId]) || $reloadCache) {
            $classEntities[$objectId] = new static(
                $classEntity, $constantName, $declaringClassName, $implementingClassName
            );
        }
        return $classEntities[$objectId];
    }

    public function getPhpHandlerSettings(): PhpHandlerSettingsInterface
    {
        return $this->classEntity->getPhpHandlerSettings();
    }

    public function getRootEntityCollection(): ClassEntityCollection
    {
        return $this->classEntity->getRootEntityCollection();
    }

    public function getEntityDependencies(): array
    {
        return $this->getRootEntity()->getEntityDependencies();
    }

    #[CacheableMethod] public function getDocBlock(): DocBlock
    {
        $classEntity = $this->getDocCommentEntity()->getImplementingClass();
        return ParserHelper::getDocBlock($classEntity, $this->getDocCommentRecursive());
    }

    public function getRootEntity(): ClassEntity
    {
        return $this->classEntity;
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

    public function getImplementingClassName(): string
    {
        return $this->implementingClassName;
    }

    public function getImplementingClass(): ClassEntity
    {
        return $this->getRootEntityCollection()->getLoadedOrCreateNew($this->getImplementingClassName());
    }

    protected function getDocCommentEntity(): ConstantEntity
    {
        return $this;
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
        return $this->constantName;
    }

    public function getShortName(): string
    {
        return $this->getName();
    }

    public function getNamespaceName(): string
    {
        return $this->getRootEntity()->getNamespaceName();
    }

    #[CacheableMethod] public function getFileName(): ?string
    {
        $fullFileName = $this->getReflection()->getDeclaringClass()->getFileName();
        if (!$fullFileName) {
            return null;
        }
        return str_replace(
            $this->configuration->getProjectRoot(),
            '',
            $fullFileName
        );
    }

    #[CacheableMethod] public function getDescription(): string
    {
        $docBlock = $this->getDocBlock();
        return $docBlock->getSummary();
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
}
