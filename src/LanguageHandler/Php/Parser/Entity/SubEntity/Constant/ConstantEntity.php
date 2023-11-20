<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Constant;

use BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache;
use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\Cache\CacheableMethod;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper;
use BumbleDocGen\LanguageHandler\Php\Parser\PhpParser\NodeValueCompiler;
use BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings;
use phpDocumentor\Reflection\DocBlock;
use PhpParser\ConstExprEvaluationException;
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
        private ClassLikeEntity $classEntity,
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

    public function getRootEntityCollection(): PhpEntitiesCollection
    {
        return $this->classEntity->getRootEntityCollection();
    }

    public function getRootEntity(): ClassLikeEntity
    {
        return $this->classEntity;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getAst(): ClassConst
    {
        if (!$this->ast) {
            $implementingClass = $this->getImplementingClass();
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
            throw new \RuntimeException("Constant `{$this->constantName}` not found in `{$this->getImplementingClassName()}` class AST");
        }
        return $this->ast;
    }

    public function getImplementingClassName(): string
    {
        return $this->implementingClassName;
    }

    public function getImplementingClass(): ClassLikeEntity
    {
        return $this->getRootEntityCollection()->getLoadedOrCreateNew($this->getImplementingClassName());
    }

    public function getDocCommentEntity(): ConstantEntity
    {
        return $this;
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
    public function getRelativeFileName(): ?string
    {
        return $this->getImplementingClass()->getRelativeFileName();
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

    /**
     * @throws ConstExprEvaluationException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getValue(): string|array|int|bool|null|float
    {
        return NodeValueCompiler::compile($this->getAst()->consts[$this->nodePosition]->value, $this);
    }
}
