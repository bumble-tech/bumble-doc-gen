<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity;

use BumbleDocGen\Core\Cache\LocalCache\Exception\InvalidCallContextException;
use BumbleDocGen\Core\Cache\LocalCache\Exception\ObjectNotFoundException;
use BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException;
use BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper;
use BumbleDocGen\Core\Parser\Entity\Cache\CacheableMethod;
use BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings;
use DI\DependencyException;
use DI\NotFoundException;
use phpDocumentor\Reflection\DocBlock;
use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflection\ReflectionProperty;

/**
 * Class property entity
 */
class PropertyEntity extends BaseEntity
{
    private ?ReflectionProperty $reflectionProperty = null;

    public function __construct(
        protected ClassEntity    $classEntity,
        private ParserHelper     $parserHelper,
        private LocalObjectCache $localObjectCache,
        protected string         $propertyName,
        protected string         $declaringClassName,
        protected string         $implementingClassName,
    )
    {
        parent::__construct(
            $classEntity->getConfiguration(),
            $classEntity->getReflector(),
            $classEntity->documentedEntityUrlFunction,
            $classEntity->renderHelper
        );
    }

    public function getRootEntity(): ClassEntity
    {
        return $this->classEntity;
    }

    public function getPhpHandlerSettings(): PhpHandlerSettings
    {
        return $this->classEntity->getPhpHandlerSettings();
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    public function getEntityDependencies(): array
    {
        return $this->getRootEntity()->getEntityDependencies();
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
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

    /**
     * @throws DependencyException
     * @throws ReflectionException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getDocBlock(): DocBlock
    {
        $classEntity = $this->getDocCommentEntity()->getImplementingClass();
        return $this->parserHelper->getDocBlock($classEntity, $this->getDocCommentRecursive());
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    public function getImplementingReflectionClass(): ReflectionClass
    {
        return $this->getReflection()->getImplementingClass();
    }

    /**
     * @throws ReflectionException
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    protected function getDocCommentEntity(): PropertyEntity
    {
        $objectId = $this->getObjectId();
        try {
            return $this->localObjectCache->getCurrentMethodCachedResult($objectId);
        } catch (ObjectNotFoundException|InvalidCallContextException) {
        }
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
        $this->localObjectCache->cacheCurrentMethodResultSilently($objectId, $reflectionProperty);
        return $reflectionProperty;
    }

    /**
     * @throws NotFoundException
     * @throws ReflectionException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] protected function getDocCommentRecursive(): string
    {
        $objectId = $this->getObjectId();
        try {
            return $this->localObjectCache->getCurrentMethodCachedResult($objectId);
        } catch (ObjectNotFoundException|InvalidCallContextException) {
        }
        $docComment = $this->getDocCommentEntity()->getDocComment() ?: ' ';
        $this->localObjectCache->cacheCurrentMethodResultSilently($objectId, $docComment);
        return $docComment;
    }

    public function getName(): string
    {
        return $this->propertyName;
    }

    public function getShortName(): string
    {
        return $this->getName();
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    public function getNamespaceName(): string
    {
        return $this->getRootEntity()->getNamespaceName();
    }

    public function getImplementingClassName(): string
    {
        return $this->implementingClassName;
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function getImplementingClass(): ClassEntity
    {
        return $this->getRootEntityCollection()->getLoadedOrCreateNew($this->getImplementingClassName());
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
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

    /**
     * @throws NotFoundException
     * @throws ReflectionException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
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

    /**
     * @throws ReflectionException
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
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

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getDescription(): string
    {
        $docBlock = $this->getDocBlock();
        return trim($docBlock->getSummary());
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function isPublic(): bool
    {
        return $this->getReflection()->isPublic();
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function isProtected(): bool
    {
        return $this->getReflection()->isProtected();
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function isPrivate(): bool
    {
        return $this->getReflection()->isPrivate();
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
    #[CacheableMethod] public function getDefaultValue(): string|array|int|bool|null|float
    {
        return $this->getReflection()->getDefaultValue();
    }
}
