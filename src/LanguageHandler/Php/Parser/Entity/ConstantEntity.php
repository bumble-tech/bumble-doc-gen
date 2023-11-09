<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity;

use BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache;
use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\Cache\CacheableMethod;
use BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper;
use BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings;
use phpDocumentor\Reflection\DocBlock;
use PhpParser\Node\Stmt\ClassConst;
use Psr\Log\LoggerInterface;

/**
 * Class constant entity
 */
class ConstantEntity extends BaseEntity
{
    /**
     * Indicates that the constant is public.
     *
     * @since 8.0
     */
    public const MODIFIERS_FLAG_IS_PUBLIC = 1;

    /**
     * Indicates that the constant is protected.
     *
     * @since 8.0
     */
    public const MODIFIERS_FLAG_IS_PROTECTED = 2;

    /**
     * Indicates that the constant is private.
     *
     * @since 8.0
     */
    public const MODIFIERS_FLAG_IS_PRIVATE = 4;

    public const VISIBILITY_MODIFIERS_FLAG_ANY =
        self::MODIFIERS_FLAG_IS_PUBLIC |
        self::MODIFIERS_FLAG_IS_PROTECTED |
        self::MODIFIERS_FLAG_IS_PRIVATE;

    private ?ClassConst $ast = null;
    private int $nodePosition = 0;

    public function __construct(
        Configuration $configuration,
        private ClassEntity $classEntity,
        private ParserHelper $parserHelper,
        LocalObjectCache $localObjectCache,
        LoggerInterface $logger,
        private string $constantName,
        private string $implementingClassName,
    ) {
        parent::__construct(
            $configuration,
            $localObjectCache,
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
     * @throws InvalidConfigurationParameterException
     */
    public function getDocBlock(): DocBlock
    {
        $classEntity = $this->getDocCommentEntity()->getImplementingClass();
        return $this->parserHelper->getDocBlock($classEntity, $this->getDocCommentRecursive());
    }

    public function getRootEntity(): ClassEntity
    {
        return $this->classEntity;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getAst(): ClassConst
    {
        $implementingClass = $this->getImplementingClass();
        if (!$this->ast) {
            foreach ($implementingClass->getAst()->getConstants() as $classConst) {
                foreach ($classConst->consts as $pos => $const) {
                    if ($const->name->toString() === $this->constantName) {
                        $this->ast = $classConst;
                        $this->nodePosition = $pos;
                        return $this->ast;
                    }
                }
            }
        }
        if (is_null($this->ast)) {
            throw new \RuntimeException("Constant `{$this->constantName}` not found in `{$implementingClass->getName()}` class AST");
        }
        return $this->ast;
    }

    public function getImplementingClassName(): string
    {
        return $this->implementingClassName;
    }

    public function getImplementingClass(): ClassEntity
    {
        return $this->getRootEntityCollection()->getLoadedOrCreateNew($this->getImplementingClassName());
    }

    public function getDocCommentEntity(): ConstantEntity
    {
        return $this;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    protected function getDocCommentRecursive(): string
    {
        return $this->getDocCommentEntity()->getDocComment() ?: ' ';
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
     * @throws InvalidConfigurationParameterException
     */
    public function getNamespaceName(): string
    {
        return $this->getRootEntity()->getNamespaceName();
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getFileName(): ?string
    {
        return $this->getImplementingClass()->getFileName();
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getDescription(): string
    {
        $docBlock = $this->getDocBlock();
        return $docBlock->getSummary();
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function isPublic(): bool
    {
        return $this->getAst()->isPublic();
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function isProtected(): bool
    {
        return $this->getAst()->isProtected();
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function isPrivate(): bool
    {
        return $this->getAst()->isPrivate();
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getStartLine(): int
    {
        return $this->getAst()->consts[$this->nodePosition]->getStartLine();
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getEndLine(): int
    {
        return $this->getAst()->consts[$this->nodePosition]->getEndLine();
    }
}
