<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity\SubEntity\Property;

use BumbleDocGen\Core\Cache\LocalCache\Exception\ObjectNotFoundException;
use BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache;
use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\Cache\CacheableMethod;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\BaseEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\PhpEntitiesCollection;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\ClassLikeEntity;
use BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper;
use BumbleDocGen\LanguageHandler\Php\Parser\PhpParser\NodeValueCompiler;
use DI\DependencyException;
use DI\NotFoundException;
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
    private ?int $nodePosition = null;

    public function __construct(
        Configuration $configuration,
        private ClassLikeEntity $classEntity,
        ParserHelper $parserHelper,
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

    public function getRootEntity(): ClassLikeEntity
    {
        return $this->classEntity;
    }

    /**
     * @inheritDoc
     *
     * @throws InvalidConfigurationParameterException
     */
    public function getAst(): Property
    {
        if (!$this->ast) {
            $implementingClass = $this->getImplementingClass();
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
            } else {
                foreach ($this->ast->props as $pos => $propNode) {
                    if ($propNode->name->toString() === $this->propertyName) {
                        $this->nodePosition = $pos;
                    }
                }
            }
        }
        if (is_null($this->ast)) {
            throw new \RuntimeException("Property `{$this->propertyName}` not found in `{$this->getImplementingClassName()}` class AST");
        }
        return $this->ast;
    }

    /**
     * @inheritDoc
     */
    public function getRootEntityCollection(): PhpEntitiesCollection
    {
        return $this->getRootEntity()->getRootEntityCollection();
    }

    /**
     * @inheritDoc
     *
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
            $reflectionProperty = $reflectionProperty->getImplementingClass()->getProperty($this->getName(), true);
        }

        if (!$docComment || str_contains(mb_strtolower($docComment), '@inheritdoc')) {
            $implementingClass = $this->getImplementingClass();
            $parentClass = $this->getImplementingClass()->getParentClass();
            $propertyName = $this->getName();
            if ($parentClass && $parentClass->isEntityDataCanBeLoaded() && $parentClass->hasProperty($propertyName)) {
                $parentReflectionProperty = $parentClass->getProperty($propertyName, true);
                $reflectionProperty = $parentReflectionProperty->getDocCommentEntity();
            } else {
                foreach ($implementingClass->getInterfacesEntities() as $interface) {
                    if ($interface->isEntityDataCanBeLoaded() && $interface->hasProperty($propertyName)) {
                        $reflectionProperty = $interface->getProperty($propertyName, true);
                        break;
                    }
                }
            }
        }
        $this->localObjectCache->cacheMethodResult(__METHOD__, $objectId, $reflectionProperty);
        return $reflectionProperty;
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return $this->propertyName;
    }

    /**
     * @inheritDoc
     */
    public function getShortName(): string
    {
        return $this->getName();
    }

    /**
     * Namespace of the class that contains this property
     *
     * @api
     */
    public function getNamespaceName(): string
    {
        return $this->getRootEntity()->getNamespaceName();
    }

    /**
     * Get the name of the class in which this property is implemented
     *
     * @api
     */
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
     *
     * @throws InvalidConfigurationParameterException
     */
    public function getRelativeFileName(): ?string
    {
        return $this->getImplementingClass()->getRelativeFileName();
    }

    /**
     * Get current property type
     *
     * @api
     *
     * @throws NotFoundException
     * @throws DependencyException
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
     * Get a text representation of property modifiers
     *
     * @api
     *
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

    /**
     * Check if this property is implemented in the parent class
     *
     * @api
     */
    public function isImplementedInParentClass(): bool
    {
        return $this->getImplementingClassName() !== $this->classEntity->getName();
    }

    /**
     * Check if a property is a public property
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
     * Check if a protected is a public protected
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
     * Check if a private is a public private
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
     * @inheritDoc
     *
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getStartLine(): int
    {
        if (is_null($this->nodePosition)) {
            return $this->getAst()->getStartLine();
        }
        return $this->getAst()->props[$this->nodePosition]->getStartLine();
    }

    /**
     * Get the line number of the end of a property's code in a file
     *
     * @api
     *
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getEndLine(): int
    {
        if (is_null($this->nodePosition)) {
            return $this->getAst()->getEndLine();
        }
        return $this->getAst()->props[$this->nodePosition]->getEndLine();
    }

    /**
     * Get the compiled default value of a property
     *
     * @api
     *
     * @return string|array|int|bool|null|float Compiled property default value
     *
     * @throws ConstExprEvaluationException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getDefaultValue(): string|array|int|bool|null|float
    {
        return NodeValueCompiler::compile($this->getAst()->props[$this->nodePosition]->default, $this);
    }
}
