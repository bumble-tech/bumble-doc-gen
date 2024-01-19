<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\ClassConstant;

use BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache;
use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\Cache\CacheableMethod;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper;
use BumbleDocGen\LanguageHandler\Php\Parser\PhpParser\NodeValueCompiler;
use PhpParser\ConstExprEvaluationException;
use PhpParser\Node\Stmt\ClassConst;
use PhpParser\PrettyPrinter\Standard;
use Psr\Log\LoggerInterface;

/**
 * Class constant entity
 */
class ClassConstantEntity extends BaseEntity
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
        private readonly ClassLikeEntity $classEntity,
        ParserHelper $parserHelper,
        LocalObjectCache $localObjectCache,
        private readonly LoggerInterface $logger,
        private readonly string $constantName,
        private readonly string $implementingClassName,
    ) {
        parent::__construct(
            $configuration,
            $localObjectCache,
            $parserHelper,
            $logger
        );
    }

    /**
     * @inheritDoc
     */
    public function getRootEntityCollection(): PhpEntitiesCollection
    {
        return $this->classEntity->getRootEntityCollection();
    }

    /**
     * Get the class like entity where this constant was obtained
     */
    public function getRootEntity(): ClassLikeEntity
    {
        return $this->classEntity;
    }

    /**
     * @inheritDoc
     *
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

    /**
     * @inheritDoc
     */
    public function getImplementingClass(): ClassLikeEntity
    {
        return $this->getRootEntityCollection()->getLoadedOrCreateNew($this->getImplementingClassName());
    }

    /**
     * @inheritDoc
     */
    public function getDocCommentEntity(): ClassConstantEntity
    {
        return $this;
    }

    /**
     * Constant name
     */
    public function getName(): string
    {
        return $this->constantName;
    }

    /**
     * Constant short name
     *
     * @see self::getName()
     */
    public function getShortName(): string
    {
        return $this->getName();
    }

    /**
     * Get the name of the namespace where the current class is implemented
     *
     * @api
     */
    public function getNamespaceName(): string
    {
        return $this->getRootEntity()->getNamespaceName();
    }

    /**
     * Get a text representation of class constant modifiers
     *
     * @api
     *
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getModifiersString(): string
    {
        $modifiersString = [];
        if ($this->isPrivate()) {
            $modifiersString[] = 'private';
        } elseif ($this->isProtected()) {
            $modifiersString[] = 'protected';
        } elseif ($this->isPublic()) {
            $modifiersString[] = 'public';
        }

        $modifiersString[] = $this->getType();
        return implode(' ', $modifiersString);
    }

    /**
     * Get current class constant type
     *
     * @api
     *
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getType(): string
    {
        $type = $this->getAst()->type;
        if ($type) {
            $astPrinter = new Standard();
            $typeString = $astPrinter->prettyPrint([$type]);
            $typeString = str_replace('?', 'null|', $typeString);
        } else {
            try {
                $typeString = gettype($this->getValue());
            } catch (\Exception) {
                $typeString = 'mixed';
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
        }
        return $this->prepareTypeString($typeString);
    }

    /**
     * Check if a constant is a public constant
     *
     * @api
     *
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function isPublic(): bool
    {
        return $this->getAst()->isPublic();
    }

    /**
     * Check if a constant is a protected constant
     *
     * @api
     *
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function isProtected(): bool
    {
        return $this->getAst()->isProtected();
    }

    /**
     * Check if a constant is a private constant
     *
     * @api
     *
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function isPrivate(): bool
    {
        return $this->getAst()->isPrivate();
    }

    /**
     * Get the line number of the beginning of the constant code in a file
     *
     * @api
     *
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getStartLine(): int
    {
        return $this->getAst()->consts[$this->nodePosition]->getStartLine();
    }

    /**
     * Get the line number of the end of a constant's code in a file
     *
     * @api
     *
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getEndLine(): int
    {
        return $this->getAst()->consts[$this->nodePosition]->getEndLine();
    }

    /**
     * Get the compiled value of a constant
     *
     * @api
     *
     * @return string|array|int|bool|null|float Compiled constant value
     *
     * @throws ConstExprEvaluationException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getValue(): string|array|int|bool|null|float
    {
        return NodeValueCompiler::compile($this->getAst()->consts[$this->nodePosition]->value, $this);
    }
}
