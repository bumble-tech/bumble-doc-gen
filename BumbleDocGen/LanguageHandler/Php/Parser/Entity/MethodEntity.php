<?php

declare(strict_types=1);

namespace BumbleDocGen\LanguageHandler\Php\Parser\Entity;

use BumbleDocGen\LanguageHandler\Php\Parser\ParserHelper;
use BumbleDocGen\Parser\Entity\Cache;
use phpDocumentor\Reflection\DocBlock;
use phpDocumentor\Reflection\DocBlock\Tags\InvalidTag;
use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflection\ReflectionMethod;

/**
 * Class method entity
 */
class MethodEntity extends BaseEntity implements MethodEntityInterface
{
    private ?ReflectionMethod $reflectionMethod = null;

    private function __construct(
        protected ClassEntity $classEntity,
        protected string      $methodName,
        protected string      $declaringClassName,
        protected string      $implementingClassName,
    )
    {
        parent::__construct($classEntity->getConfiguration(), $classEntity->getReflector());
    }

    public static function create(
        ClassEntity $classEntity,
        string      $methodName,
        string      $declaringClassName,
        string      $implementingClassName,
        bool        $reloadCache = false
    ): MethodEntity
    {
        static $entities = [];
        $objectId = "{$classEntity->getName()}:{$methodName}";
        if (!isset($entities[$objectId]) || $reloadCache) {
            $entities[$objectId] = new static(
                $classEntity, $methodName, $declaringClassName, $implementingClassName
            );
        }
        return $entities[$objectId];
    }

    public function getReflection(): ReflectionMethod
    {
        if (!$this->reflectionMethod) {
            $this->reflectionMethod = $this->classEntity->getReflection()->getMethod($this->methodName);
        }
        return $this->reflectionMethod;
    }

    public function getClassEntity(): ClassEntity
    {
        return $this->classEntity;
    }

    public function getEntityDependencies(): array
    {
        return $this->getClassEntity()->getEntityDependencies();
    }

    protected function getClassEntityCollection(): ClassEntityCollection
    {
        return $this->getClassEntity()->getClassEntityCollection();
    }

    #[Cache\CacheableMethod] public function getDocBlock(): DocBlock
    {
        $classEntity = $this->getDocCommentEntity()->getImplementingClass();
        return ParserHelper::getDocBlock($classEntity, $this->getDocCommentRecursive());
    }

    public function getImplementingReflectionClass(): ReflectionClass
    {
        return $this->getReflection()->getImplementingClass();
    }

    public function getImplementingClass(): ClassEntity
    {
        return $this->getClassEntityCollection()->getLoadedOrCreateNew($this->getImplementingClassName());
    }

    public function getShortName(): string
    {
        return $this->getName();
    }

    public function getNamespaceName(): string
    {
        return $this->getClassEntity()->getNamespaceName();
    }

    protected function getDocCommentEntity(): MethodEntity
    {
        static $docCommentsReflectionCache = [];
        $objectId = $this->getObjectId();
        if (!isset($docCommentsReflectionCache[$objectId])) {
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
            $docCommentsReflectionCache[$objectId] = $reflectionMethod;
        }
        return $docCommentsReflectionCache[$objectId];
    }

    #[Cache\CacheableMethod] protected function getDocCommentRecursive(): string
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
        return $this->methodName;
    }

    #[Cache\CacheableMethod] public function isConstructor(): bool
    {
        return $this->getReflection()->isConstructor();
    }

    #[Cache\CacheableMethod] public function getFileName(): ?string
    {
        $fullFileName = $this->getReflection()->getImplementingClass()->getFileName();
        if (!$fullFileName || !str_starts_with($fullFileName, $this->configuration->getProjectRoot())) {
            return null;
        }

        return str_replace(
            $this->configuration->getProjectRoot(),
            '',
            $fullFileName
        );
    }

    #[Cache\CacheableMethod] public function getModifiersString(): string
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
        }

        $modifiersString[] = 'function';

        return implode(' ', $modifiersString);
    }

    #[Cache\CacheableMethod] public function getReturnType(): string
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
     * @param \phpDocumentor\Reflection\DocBlock\Tags\Param[] $params
     */
    #[Cache\CacheableMethod] public static function parseAnnotationParams(array $params): array
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

    #[Cache\CacheableMethod] private function isArrayAnnotationType(string $annotationType): bool
    {
        return preg_match('/^([a-zA-Z\\_]+)(\[\])$/', $annotationType) ||
            preg_match('/^(array)(<|{)(.*)(>|})$/', $annotationType);
    }

    #[Cache\CacheableMethod] public function getParameters(): array
    {
        $parameters = [];
        $docBlock = $this->getDocBlock();

        /**
         * @var \phpDocumentor\Reflection\DocBlock\Tags\Param[] $params
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

    #[Cache\CacheableMethod] public function getParametersString(): string
    {
        $parameters = [];
        foreach ($this->getParameters() as $parameterData) {
            $parameters[] = "{$parameterData['type']} \${$parameterData['name']}" .
                ($parameterData['defaultValue'] ? " = {$parameterData['defaultValue']}" : '');
        }
        return implode(', ', $parameters);
    }

    #[Cache\CacheableMethod] public function isImplementedInParentClass(): bool
    {
        return $this->getImplementingClassName() !== $this->classEntity->getName();
    }

    public function getImplementingClassName(): string
    {
        return $this->implementingClassName;
    }

    #[Cache\CacheableMethod] public function getDescription(): string
    {
        $docBlock = $this->getDocBlock();
        return trim($docBlock->getSummary());
    }

    #[Cache\CacheableMethod] public function isInitialization(): bool
    {
        if ($this->getReflection()->getName() === '__construct') {
            return true;
        }

        $initializationReturnTypes = [
            'self',
            'static',
            'this',
            $this->getImplementingReflectionClass()->getName(),
            $this->getImplementingReflectionClass()->getShortName(),
        ];
        return $this->getReflection()->isStatic() && in_array($this->getReturnType(), $initializationReturnTypes);
    }

    public function isDynamic(): bool
    {
        return false;
    }

    #[Cache\CacheableMethod] public function isPublic(): bool
    {
        return $this->getReflection()->isPublic();
    }

    #[Cache\CacheableMethod] public function isProtected(): bool
    {
        return $this->getReflection()->isProtected();
    }

    #[Cache\CacheableMethod] public function isPrivate(): bool
    {
        return $this->getReflection()->isPrivate();
    }

    #[Cache\CacheableMethod] public function getStartLine(): int
    {
        return $this->getReflection()->getStartLine();
    }

    #[Cache\CacheableMethod] public function getEndLine(): int
    {
        return $this->getReflection()->getEndLine();
    }

    #[Cache\CacheableMethod] public function getFirstReturnValue(): mixed
    {
        return ParserHelper::getMethodReturnValue(
            $this->reflector,
            $this->getClassEntity()->getReflection(),
            $this->getReflection()
        );
    }

    #[Cache\CacheableMethod] public function getBodyCode(): string
    {
        return $this->getReflection()->getBodyCode();
    }
}
