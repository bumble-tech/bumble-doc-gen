<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity;

use BumbleDocGen\Core\Cache\LocalCache\Exception\ObjectNotFoundException;
use BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache;
use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Renderer\RendererHelper;
use BumbleDocGen\Core\Renderer\Twig\Function\GetDocumentedEntityUrl;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Reflection\ReflectorWrapper;
use BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper;
use BumbleDocGen\Core\Parser\Entity\Cache\CacheableMethod;
use BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings;
use DI\DependencyException;
use DI\NotFoundException;
use phpDocumentor\Reflection\DocBlock;
use Psr\Log\LoggerInterface;
use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflection\ReflectionClassConstant;

/**
 * Class constant entity
 */
class ConstantEntity extends BaseEntity
{
    private ?ReflectionClassConstant $reflectionClassConstant = null;

    public function __construct(
        private Configuration    $configuration,
        private ClassEntity      $classEntity,
        private ParserHelper     $parserHelper,
        private LocalObjectCache $localObjectCache,
        LoggerInterface          $logger,
        ReflectorWrapper         $reflectorWrapper,
        RendererHelper           $renderHelper,
        GetDocumentedEntityUrl   $documentedEntityUrlFunction,
        private string           $constantName,
        private string           $declaringClassName,
        private string           $implementingClassName,
    )
    {
        parent::__construct(
            $configuration,
            $reflectorWrapper,
            $localObjectCache,
            $documentedEntityUrlFunction,
            $renderHelper,
            $parserHelper,
            $logger
        );
    }

    public function getPhpHandlerSettings(): PhpHandlerSettings
    {
        return $this->classEntity->getPhpHandlerSettings();
    }

    public function getRootEntityCollection(): ClassEntityCollection
    {
        return $this->classEntity->getRootEntityCollection();
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
     * @throws NotFoundException
     * @throws DependencyException
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getDocBlock(): DocBlock
    {
        $classEntity = $this->getDocCommentEntity()->getImplementingClass();
        return $this->parserHelper->getDocBlock($classEntity, $this->getDocCommentRecursive());
    }

    public function getRootEntity(): ClassEntity
    {
        return $this->classEntity;
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    protected function getReflection(): ReflectionClassConstant
    {
        if (!$this->reflectionClassConstant) {
            $this->reflectionClassConstant = $this->classEntity->getReflection()->getReflectionConstant($this->constantName);
        }
        return $this->reflectionClassConstant;
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    public function getImplementingReflectionClass(): ReflectionClass
    {
        return $this->getReflection()->getDeclaringClass();
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

    public function getDocCommentEntity(): ConstantEntity
    {
        return $this;
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] protected function getDocCommentRecursive(): string
    {
        $objectId = $this->getObjectId();
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $objectId);
        } catch (ObjectNotFoundException) {
        }
        $docComment = $this->getDocCommentEntity()->getDocComment() ?: ' ';
        $this->localObjectCache->cacheMethodResult(__METHOD__, $objectId, $docComment);
        return $docComment;
    }

    public function getName(): string
    {
        return $this->constantName;
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

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
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

    /**
     * @throws NotFoundException
     * @throws ReflectionException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getDescription(): string
    {
        $docBlock = $this->getDocBlock();
        return $docBlock->getSummary();
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
}
