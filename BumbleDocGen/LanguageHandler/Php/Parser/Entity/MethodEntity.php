<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity;

use BumbleDocGen\Core\Cache\LocalCache\Exception\ObjectNotFoundException;
use BumbleDocGen\Core\Cache\LocalCache\LocalObjectCache;
use BumbleDocGen\Core\Configuration\Configuration;
use BumbleDocGen\Core\Configuration\Exception\InvalidConfigurationParameterException;
use BumbleDocGen\Core\Parser\Entity\Cache\CacheableMethod;
use BumbleDocGen\LanguageHandler\Php\Parser\Entity\Exception\ReflectionException;
use BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper;
use BumbleDocGen\LanguageHandler\Php\PhpHandlerSettings;
use DI\DependencyException;
use DI\NotFoundException;
use phpDocumentor\Reflection\DocBlock;
use phpDocumentor\Reflection\DocBlock\Tags\InvalidTag;
use phpDocumentor\Reflection\DocBlock\Tags\Param;
use Psr\Log\LoggerInterface;
use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflection\ReflectionMethod;

/**
 * Class method entity
 */
class MethodEntity extends BaseEntity implements MethodEntityInterface
{
    private ?ReflectionMethod $reflectionMethod = null;

    public function __construct(
        Configuration            $configuration,
        private ClassEntity      $classEntity,
        private ParserHelper     $parserHelper,
        private LocalObjectCache $localObjectCache,
        LoggerInterface          $logger,
        private string           $methodName,
        private string           $declaringClassName,
        private string           $implementingClassName,
    )
    {
        parent::__construct(
            $configuration,
            $localObjectCache,
            $parserHelper,
            $logger
        );
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    protected function getReflection(): ReflectionMethod
    {
        if (!$this->reflectionMethod) {
            $this->reflectionMethod = $this->classEntity->getReflection()->getMethod($this->methodName);
        }
        return $this->reflectionMethod;
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

    public function getImplementingClass(): ClassEntity
    {
        return $this->getRootEntityCollection()->getLoadedOrCreateNew($this->getImplementingClassName());
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
        if (!$docComment || str_contains(mb_strtolower($docComment), '@inheritdoc')) {
            $implementingClass = $this->getImplementingClass();
            $parentClass = $this->getImplementingClass()->getParentClass();
            $methodName = $this->getName();
            if ($parentClass && $parentClass->hasMethod($methodName)) {
                $parentReflectionMethod = $parentClass->getMethodEntity($methodName);
                $reflectionMethod = $parentReflectionMethod->getDocCommentEntity();
            } else {
                foreach ($implementingClass->getInterfacesEntities() as $interface) {
                    if ($interface->hasMethod($methodName)) {
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
     * @throws NotFoundException
     * @throws ReflectionException
     * @throws DependencyException
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
        return $this->methodName;
    }

    public function isConstructor(): bool
    {
        return $this->getName() === '__construct';
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
     * @throws ReflectionException
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
     * @throws ReflectionException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getReturnType(): string
    {
        $type = $this->getReflection()->getReturnType();
        if ($type) {
            $type = (string)$type;
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
            $type = $returnType ? (string)$returnType->getType() : 'mixed';
            $type = preg_replace_callback(['/({)([^{}]*)(})/', '/(\[)([^\[\]]*)(\])/'], function ($condition) {
                return str_replace(' ', '', $condition[0]);
            }, $type);
        }
        return $this->prepareTypeString($type);
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
     * @throws ReflectionException
     * @throws DependencyException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getParameters(): array
    {
        $parameters = [];
        $docBlock = $this->getDocBlock();

        /**
         * @var Param[] $params
         */
        $params = $docBlock->getTagsByName('param');
        $typesFromDoc = $this->parseAnnotationParams($params);
        foreach ($this->getReflection()->getParameters() as $param) {
            try {
                $param->getType();
            } catch (\Exception $e) {
                if (preg_match('/(not locate constant ")([\s\S]+)(")/', $e->getMessage(), $matches)) {
                    // Temporary hack to get rid of global constants parsing error
                    $constEvalString = 'const ' . $matches[2] . "='';";
                    eval($constEvalString);
                }
            }
            $type = (string)$param->getType();
            $annotationType = '';
            $name = $param->getName();
            $description = '';
            if (isset($typesFromDoc[$name])) {
                $annotationType = $typesFromDoc[$name]['type'] ?? '';
                $type = $type ?: $annotationType;

                $description = $typesFromDoc[$name]['description'];
            }
            $type = $type ?: 'mixed';
            $expectedType = $type;
            if ($type == 'array' && $this->isArrayAnnotationType($annotationType)) {
                $expectedType = $annotationType;
            }
            $defaultValue = '';
            try {
                $defaultValue = $this->prettyVarExport($param->getDefaultValue());
            } catch (\Exception) {
            }
            try {
                $defaultValue = $param->getDefaultValueConstantName();
            } catch (\Exception) {
            }
            $parameters[] = [
                'type' => $this->prepareTypeString($type),
                'expectedType' => $expectedType,
                'name' => $name,
                'defaultValue' => $this->prepareTypeString($defaultValue),
                'description' => $description,
            ];
        }
        return $parameters;
    }

    /**
     * @throws NotFoundException
     * @throws DependencyException
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    public function getParametersString(): string
    {
        $parameters = [];
        foreach ($this->getParameters() as $parameterData) {
            $parameters[] = "{$parameterData['type']} \${$parameterData['name']}" .
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
    #[CacheableMethod] public function isStatic(): bool
    {
        return $this->getReflection()->isStatic();
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
    #[CacheableMethod] public function getFirstReturnValue(): mixed
    {
        return $this->parserHelper->getMethodReturnValue(
            $this->getRootEntity()->getReflection(),
            $this->getReflection()
        );
    }

    /**
     * @throws ReflectionException
     * @throws InvalidConfigurationParameterException
     */
    #[CacheableMethod] public function getBodyCode(): string
    {
        return $this->getReflection()->getBodyCode();
    }
}
