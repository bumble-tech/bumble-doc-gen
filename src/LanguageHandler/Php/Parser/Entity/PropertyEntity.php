<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity;

use BumbleDocGen\Core\Cache\LocalCache\Exception\ObjectNotFoundException;
use BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache;
use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\Cache\CacheableMethod;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Ast\NodeCompiler\CompileNodeToValue;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Ast\NodeCompiler\CompilerContext;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException;
use BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper;
use BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings;
use DI\DependencyException;
use DI\NotFoundException;
use phpDocumentor\Reflection\DocBlock;
use PhpParser\ConstExprEvaluationException;
use PhpParser\Node;
use PhpParser\Node\Stmt\Property;
use PhpParser\PrettyPrinter\Standard;
use Psr\Log\LoggerInterface;

/**
 * Class property entity
 */
class PropertyEntity extends BaseEntity
{
    /**
     * Indicates that the property is public.
     *
     * @link https://www.php.net/manual/en/class.reflectionproperty.php#reflectionproperty.constants.is-public
     */
    public const MODIFIERS_FLAG_IS_PUBLIC = 1;

    /**
     * Indicates that the property is protected.
     *
     * @link https://www.php.net/manual/en/class.reflectionproperty.php#reflectionproperty.constants.is-protected
     */
    public const MODIFIERS_FLAG_IS_PROTECTED = 2;

    /**
     * Indicates that the property is private.
     *
     * @link https://www.php.net/manual/en/class.reflectionproperty.php#reflectionproperty.constants.is-private
     */
    public const MODIFIERS_FLAG_IS_PRIVATE = 4;

    public const VISIBILITY_MODIFIERS_FLAG_ANY =
        self::MODIFIERS_FLAG_IS_PUBLIC |
        self::MODIFIERS_FLAG_IS_PROTECTED |
        self::MODIFIERS_FLAG_IS_PRIVATE;


    private ?Property $ast = null;

    public function __construct(
        Configuration $configuration,
        private ClassEntity $classEntity,
        private ParserHelper $parserHelper,
        private Standard $astPrinter,
        private LocalObjectCache $localObjectCache,
        private LoggerInterface $logger,
        private string $propertyName,
        private string $implementingClassName,
    ) {
        parent::__construct(
            $configuration,
            $localObjectCache,
            $parserHelper,
            $logger
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
    public function getAst(): Property
    {
        $implementingClass = $this->getImplementingClass();
        if (!$this->ast) {
            $classAst = $implementingClass->getAst();
            $this->ast = $classAst->getProperty($this->propertyName);
            if (!$this->ast) {
                $methodAst = $classAst->getMethod('__construct');
                foreach ($methodAst?->getParams() ?? [] as $param) {
                    if ($param->var->name === $this->propertyName) {
                        $this->ast = new Node\Stmt\Property(
                            $param->flags,
                            [new Node\Stmt\PropertyProperty($param->var->name)],
                            $param->getAttributes(),
                            $param->type,
                            $param->attrGroups,
                        );
                        return $this->ast;
                    }
                }
            }
        }
        if (is_null($this->ast)) {
            throw new \RuntimeException("Property `{$this->propertyName}` not found in `{$implementingClass->getName()}` class AST");
        }
        return $this->ast;
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
    public function getDocBlock(): DocBlock
    {
        $classEntity = $this->getDocCommentEntity()->getImplementingClass();
        return $this->parserHelper->getDocBlock($classEntity, $this->getDocCommentRecursive());
    }

    /**
     * @throws ReflectionException
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public function getDocCommentEntity(): PropertyEntity
    {
        $objectId = $this->getObjectId();
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $objectId);
        } catch (ObjectNotFoundException) {
        }
        $docComment = $this->getDocComment();
        $reflectionProperty = $this;
        if ($reflectionProperty->isImplementedInParentClass()) {
            $reflectionProperty = $reflectionProperty->getImplementingClass()->getPropertyEntity($this->getName());
        }

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
        $this->localObjectCache->cacheMethodResult(__METHOD__, $objectId, $reflectionProperty);
        return $reflectionProperty;
    }

    /**
     * @throws NotFoundException
     * @throws ReflectionException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    protected function getDocCommentRecursive(): string
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

    public function getImplementingClass(): ClassEntity
    {
        return $this->getRootEntityCollection()->getLoadedOrCreateNew($this->getImplementingClassName());
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    public function getFileName(): ?string
    {
        return $this->getImplementingClass()->getFileName();
    }

    /**
     * @throws NotFoundException
     * @throws ReflectionException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getType(): string
    {
        $type = $this->getAst()->type;
        if ($type) {
            $typeString = $this->astPrinter->prettyPrint([$type]);
            $typeString = str_replace('?', 'null|', $typeString);
        } else {
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
        if ($this->isPrivate()) {
            $modifiersString[] = 'private';
        } elseif ($this->isProtected()) {
            $modifiersString[] = 'protected';
        } elseif ($this->isPublic()) {
            $modifiersString[] = 'public';
        }

        if ($this->getAst()->isStatic()) {
            $modifiersString[] = 'static';
        } elseif ($this->getAst()->isReadOnly()) {
            $modifiersString[] = 'readonly';
        }

        $modifiersString[] = $this->getType();
        return implode(' ', $modifiersString);
    }

    public function isImplementedInParentClass(): bool
    {
        return $this->getImplementingClassName() !== $this->classEntity->getName();
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    public function getDescription(): string
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
        return $this->getAst()->isPublic();
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function isProtected(): bool
    {
        return $this->getAst()->isProtected();
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function isPrivate(): bool
    {
        return $this->getAst()->isPrivate();
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getStartLine(): int
    {
        return $this->getAst()->getStartLine();
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getEndLine(): int
    {
        return $this->getAst()->getEndLine();
    }

    /**
     * @throws ReflectionException
     * @throws ConstExprEvaluationException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getDefaultValue(): string|array|int|bool|null|float
    {
        $compiler = new CompileNodeToValue();
        $compiledValue = $compiler($this->getAst()->props[0]->default, new CompilerContext($this));
        return $compiledValue->value;
    }
}
