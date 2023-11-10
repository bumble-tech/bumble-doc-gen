<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity;

use BumbleDocGen\Core\Cache\LocalCache\Exception\ObjectNotFoundException;
use BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache;
use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\Cache\CacheableMethod;
use BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper;
use BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings;
use DI\DependencyException;
use DI\NotFoundException;
use phpDocumentor\Reflection\DocBlock;
use phpDocumentor\Reflection\DocBlock\Tags\InvalidTag;
use phpDocumentor\Reflection\DocBlock\Tags\Param;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\PrettyPrinter\Standard;
use Psr\Log\LoggerInterface;

/**
 * Class method entity
 */
class MethodEntity extends BaseEntity implements MethodEntityInterface
{
    /**
     * Indicates that the method is public.
     */
    public const MODIFIERS_FLAG_IS_PUBLIC = 1;

    /**
     * Indicates that the method is protected.
     */
    public const MODIFIERS_FLAG_IS_PROTECTED = 2;

    /**
     * Indicates that the method is private.
     */
    public const MODIFIERS_FLAG_IS_PRIVATE = 4;

    public const VISIBILITY_MODIFIERS_FLAG_ANY =
        self::MODIFIERS_FLAG_IS_PUBLIC |
        self::MODIFIERS_FLAG_IS_PROTECTED |
        self::MODIFIERS_FLAG_IS_PRIVATE;

    private ?ClassMethod $ast = null;

    public function __construct(
        private Configuration $configuration,
        private ClassEntity $classEntity,
        private ParserHelper $parserHelper,
        private Standard $astPrinter,
        private LocalObjectCache $localObjectCache,
        private LoggerInterface $logger,
        private string $methodName,
        private string $implementingClassName,
    ) {
        parent::__construct(
            $configuration,
            $localObjectCache,
            $parserHelper,
            $logger
        );
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    public function getAst(): ClassMethod
    {
        if (!$this->ast) {
            $implementingClass = $this->getImplementingClass();
            $this->ast = $implementingClass->getAst()->getMethod($this->methodName);
        }
        if (is_null($this->ast)) {
            throw new \RuntimeException("Method `{$this->methodName}` not found in `{$this->getImplementingClassName()}` class AST");
        }
        return $this->ast;
    }

    public function getRootEntity(): ClassEntity
    {
        return $this->classEntity;
    }

    public function getPhpHandlerSettings(): PhpHandlerSettings
    {
        return $this->classEntity->getPhpHandlerSettings();
    }

    public function getRootEntityCollection(): ClassEntityCollection
    {
        return $this->getRootEntity()->getRootEntityCollection();
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public function getDocBlock(bool $recursive = true): DocBlock
    {
        if ($recursive) {
            $classEntity = $this->getDocCommentEntity()->getImplementingClass();
            return $this->parserHelper->getDocBlock($classEntity, $this->getDocCommentRecursive(), $this->getDocCommentLineRecursive());
        }
        $classEntity = $this->getImplementingClass();
        return $this->parserHelper->getDocBlock($classEntity, $this->getDocComment(), $this->getDocCommentLine());
    }

    public function getImplementingClass(): ClassEntity
    {
        return $this->getRootEntityCollection()->getLoadedOrCreateNew($this->getImplementingClassName());
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
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public function getDocCommentEntity(): MethodEntity
    {
        $objectId = $this->getObjectId();
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $objectId);
        } catch (ObjectNotFoundException) {
        }
        $docComment = $this->getDocComment();
        $reflectionMethod = $this;
        if ($reflectionMethod->isImplementedInParentClass()) {
            $reflectionMethod = $reflectionMethod->getImplementingClass()->getMethodEntity($this->getName());
        }

        if (!$docComment || str_contains(mb_strtolower($docComment), '@inheritdoc')) {
            $implementingClass = $this->getImplementingClass();
            $parentClass = $this->getImplementingClass()->getParentClass();
            $methodName = $this->getName();
            if ($parentClass && $parentClass->entityDataCanBeLoaded() && $parentClass->hasMethod($methodName)) {
                $parentReflectionMethod = $parentClass->getMethodEntity($methodName);
                $reflectionMethod = $parentReflectionMethod->getDocCommentEntity();
            } else {
                foreach ($implementingClass->getInterfacesEntities() as $interface) {
                    if ($interface->entityDataCanBeLoaded() && $interface->hasMethod($methodName)) {
                        $reflectionMethod = $interface->getMethodEntity($methodName);
                        break;
                    }
                }
            }
        }
        $this->localObjectCache->cacheMethodResult(__METHOD__, $objectId, $reflectionMethod);
        return $reflectionMethod;
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public function getPrototype(): ?MethodEntity
    {
        $objectId = $this->getObjectId();
        try {
            return $this->localObjectCache->getMethodCachedResult(__METHOD__, $objectId);
        } catch (ObjectNotFoundException) {
        }
        $prototype = null;
        $implementingClass = $this->getImplementingClass();
        $parentClass = $this->getImplementingClass()->getParentClass();
        $methodName = $this->getName();
        if ($parentClass && $parentClass->hasMethod($methodName)) {
            $prototype = $parentClass->getMethodEntity($methodName);
        } else {
            foreach ($implementingClass->getInterfacesEntities() as $interface) {
                if ($interface->hasMethod($methodName)) {
                    $prototype = $interface->getMethodEntity($methodName);
                    break;
                }
            }
        }
        $this->localObjectCache->cacheMethodResult(__METHOD__, $objectId, $prototype);
        return $prototype;
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    public function getDocCommentRecursive(): string
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

    /**
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getDocCommentLineRecursive(): ?int
    {
        $methodEntity = $this->getDocCommentEntity();
        if ($methodEntity->getDocCommentRecursive()) {
            return $methodEntity->getAst()->getDocComment()?->getStartLine();
        }
        return null;
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getDocCommentLine(): ?int
    {
        return $this->getAst()->getDocComment()?->getStartLine();
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public function getSignature(): string
    {
        return "{$this->getModifiersString()} {$this->getName()}({$this->getParametersString()})" . (!$this->isConstructor() ? ": {$this->getReturnType()}" : '');
    }

    public function getName(): string
    {
        return $this->methodName;
    }

    public function isConstructor(): bool
    {
        return $this->getName() === '__construct';
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
    public function getModifiersString(): string
    {
        $modifiersString = [];
        if ($this->isPrivate()) {
            $modifiersString[] = 'private';
        } elseif ($this->isProtected()) {
            $modifiersString[] = 'protected';
        } elseif ($this->isPublic()) {
            $modifiersString[] = 'public';
        }

        if ($this->isStatic()) {
            $modifiersString[] = 'static';
        }

        $modifiersString[] = 'function';

        return implode(' ', $modifiersString);
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getReturnType(): string
    {
        $type = $this->getAst()->getReturnType();
        if ($type) {
            $typeString = $this->astPrinter->prettyPrint([$type]);
            $typeString = str_replace('?', 'null|', $typeString);
        } else {
            $docBlock = $this->getDocBlock();
            $returnType = $docBlock->getTagsByName('return');
            $returnType = $returnType[0] ?? null;

            if ($returnType && is_a($returnType, InvalidTag::class)) {
                if (str_starts_with((string)$returnType, 'array')) {
                    return 'array';
                }
                return 'mixed';
            }
            $typeString = $returnType ? (string)$returnType->getType() : 'mixed';
            $typeString = preg_replace_callback(['/({)([^{}]*)(})/', '/(\[)([^\[\]]*)(\])/'], function ($condition) {
                return str_replace(' ', '', $condition[0]);
            }, $typeString);
        }
        return $this->prepareTypeString($typeString);
    }

    /**
     * @param Param[] $params
     */
    public static function parseAnnotationParams(array $params): array
    {
        $paramsFromDoc = [];
        foreach ($params as $param) {
            try {
                if (method_exists($param, 'getVariableName')) {
                    $paramsFromDoc[$param->getVariableName()] = [
                        'name' => (string)$param->getVariableName(),
                        'type' => (string)$param->getType(),
                        'description' => (string)$param->getDescription(),
                        'defaultValue' => null,
                    ];
                }
            } catch (\Exception) {
            }
        }
        return $paramsFromDoc;
    }

    private function isArrayAnnotationType(string $annotationType): bool
    {
        return preg_match('/^([a-zA-Z\\_]+)(\[\])$/', $annotationType) ||
            preg_match('/^(array)(<|{)(.*)(>|})$/', $annotationType);
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     * @throws \Exception
     */
    #[CacheableMethod] public function getParameters(): array
    {
        $parameters = [];
        $docBlock = $this->getDocBlock();

        /**
         * @var Param[] $params
         */
        $params = $docBlock->getTagsByName('param');
        $typesFromDoc = self::parseAnnotationParams($params);
        try {
            /** @var \PhpParser\Node\Param[] $params */
            $params = $this->getAst()->getParams();
            foreach ($params as $param) {
                if (!$param->var instanceof \PhpParser\Node\Expr\Variable) {
                    continue;
                }

                $type = '';
                $defaultValue = '';
                $annotationType = '';
                $description = '';
                $name = $param->var->name;

                $paramAst = $param->jsonSerialize();
                if ($paramAst['type']) {
                    $type = $this->astPrinter->prettyPrint([$paramAst['type']]);
                    if (str_starts_with($type, '?')) {
                        $type = str_replace('?', '', $type) . '|null';
                    }
                }
                if ($paramAst['default']) {
                    $defaultValue = $this->astPrinter->prettyPrint([$paramAst['default']]);
                    $defaultValue = str_replace('array()', '[]', $defaultValue);
                }
                if (isset($typesFromDoc[$name])) {
                    $annotationType = $typesFromDoc[$name]['type'] ?? '';
                    $type = $type ?: $annotationType;
                    $description = $typesFromDoc[$name]['description'];
                }
                $type = $type ?: 'mixed';
                $expectedType = $type;
                if ($type === 'array' && $this->isArrayAnnotationType($annotationType)) {
                    $expectedType = $annotationType;
                }

                $defaultValue = str_replace(
                    [
                        $this->configuration->getWorkingDir(),
                        $this->configuration->getProjectRoot(),
                    ],
                    '',
                    $defaultValue
                );
                $parameters[] = [
                    'type' => $this->prepareTypeString($type),
                    'expectedType' => $expectedType,
                    'isVariadic' => $param->variadic,
                    'name' => $name,
                    'defaultValue' => $this->prepareTypeString($defaultValue),
                    'description' => $description,
                ];
            }
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
        }
        return $parameters;
    }

    /**
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     * @throws DependencyException
     */
    public function getParametersString(): string
    {
        $parameters = [];
        foreach ($this->getParameters() as $parameterData) {
            $variadicPart = ($parameterData['isVariadic'] ?? false) ? '...' : '';
            $parameters[] = "{$parameterData['type']} {$variadicPart}\${$parameterData['name']}" .
                ($parameterData['defaultValue'] ? " = {$parameterData['defaultValue']}" : '');
        }
        return implode(', ', $parameters);
    }

    public function isImplementedInParentClass(): bool
    {
        return $this->getImplementingClassName() !== $this->classEntity->getName();
    }

    public function getImplementingClassName(): string
    {
        return $this->implementingClassName;
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    public function getDescription(): string
    {
        $docBlock = $this->getDocBlock();
        return trim($docBlock->getSummary());
    }

    /**
     * @throws DependencyException
     * @throws NotFoundException
     * @throws InvalidConfigurationParameterException
     */
    public function isInitialization(): bool
    {
        if ($this->isConstructor()) {
            return true;
        }

        $nameParts = explode('\\', $this->getName());
        $implementingClassShortName = end($nameParts);

        $initializationReturnTypes = [
            'self',
            'static',
            'this',
            $this->getImplementingClassName(),
            $implementingClassShortName,
        ];
        return $this->isStatic() && in_array($this->getReturnType(), $initializationReturnTypes);
    }

    public function isDynamic(): bool
    {
        return false;
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
    #[CacheableMethod] public function isStatic(): bool
    {
        return $this->getAst()->isStatic();
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
        return $this->getAst()->getStartLine();
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getStartColumn(): int
    {
        return $this->getAst()->getStartFilePos();
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getEndLine(): int
    {
        return $this->getAst()->getEndLine();
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getFirstReturnValue(): mixed
    {
        return $this->parserHelper->getMethodReturnValue($this);
    }

    /**
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getBodyCode(): string
    {
        $stmts = $this->getAst()->getStmts();
        if (!is_array($stmts)) {
            $stmts = [];
        }
        return $this->astPrinter->prettyPrint($stmts);
    }

    #[CacheableMethod] public function getDocComment(): string
    {
        $docComment = $this->getAst()->getDocComment();
        return (string)$docComment?->getReformattedText();
    }
}
