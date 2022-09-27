<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\Entity;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Parser\AttributeParser;
use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflection\ReflectionMethod;
use Roave\BetterReflection\Reflector\Reflector;

final class MethodEntity extends BaseEntity implements MethodEntityInterface
{
    private function __construct(
        protected ConfigurationInterface $configuration,
        protected Reflector $reflector,
        protected ReflectionClass $reflectionClass,
        protected ReflectionMethod $reflection,
        protected AttributeParser $attributeParser
    ) {
        parent::__construct($configuration, $reflector, $attributeParser);
    }

    public static function create(
        ConfigurationInterface $configuration,
        Reflector $reflector,
        ReflectionClass $reflectionClass,
        ReflectionMethod $reflectionMethod,
        AttributeParser $attributeParser,
        bool $reloadCache = false
    ): MethodEntity {
        static $classEntities = [];
        $objectId = self::generateObjectIdByReflection($reflectionMethod) . $reflectionClass->getName();
        if (!isset($classEntities[$objectId]) || $reloadCache) {
            $classEntities[$objectId] = new MethodEntity(
                $configuration, $reflector, $reflectionClass, $reflectionMethod, $attributeParser
            );
        }
        return $classEntities[$objectId];
    }

    public function getReflection(): ReflectionMethod
    {
        return $this->reflection;
    }

    public function getImplementingReflectionClass(): ReflectionClass
    {
        return $this->reflection->getImplementingClass();
    }

    protected function getDocCommentReflectionRecursive(): ReflectionMethod
    {
        static $docCommentsReflectionCache = [];
        $objectId = $this->getObjectId();
        if (!isset($docCommentsReflectionCache[$objectId])) {
            $getDocCommentReflection = function (ReflectionMethod $reflectionMethod) use (&$getDocCommentReflection
            ): ReflectionMethod {
                $docComment = $reflectionMethod->getDocComment();
                if (!$docComment || str_contains(mb_strtolower($docComment), '@inheritdoc')) {
                    try {
                        $implementingClass = $reflectionMethod->getImplementingClass();
                        $parentClass = $reflectionMethod->getImplementingClass()->getParentClass();
                        $methodName = $reflectionMethod->getShortName();
                        if ($parentClass && $parentClass->hasMethod($methodName)) {
                            $parentReflectionMethod = $parentClass->getMethod($methodName);
                            $reflectionMethod = $getDocCommentReflection($parentReflectionMethod);
                        } else {
                            foreach ($implementingClass->getInterfaces() as $interface) {
                                if ($interface->hasMethod($methodName)) {
                                    $reflectionMethod = $interface->getMethod($methodName);
                                    break;
                                }
                            }
                        }
                    } catch (\Exception $e) {
                        $this->logger->error($e->getMessage());
                    }
                }
                return $reflectionMethod;
            };
            $docCommentsReflectionCache[$objectId] = $getDocCommentReflection($this->reflection);
        }
        return $docCommentsReflectionCache[$objectId];
    }

    protected function getDocCommentRecursive(): string
    {
        static $docCommentsCache = [];
        $objectId = $this->getObjectId();
        if (!isset($docCommentsCache[$objectId])) {
            $docCommentsCache[$objectId] = $this->getDocCommentReflectionRecursive()->getDocComment() ?: ' ';
        }
        return $docCommentsCache[$objectId];
    }

    public function getDocAnnotation(): ?object
    {
        static $docAttributesCache = [];
        $objectId = $this->getObjectId();
        if (!isset($docAttributesCache[$objectId])) {
            $docAttributesCache[$objectId] = $this->attributeParser->getAnnotationIfIsSubclassOf(
                $this->reflection->getDocComment(),
                'DocumentationGenerator\Annotations\MethodDocAnnotation'
            );
        }
        return $docAttributesCache[$objectId];
    }

    public function getName(): string
    {
        return $this->getReflection()->getName();
    }

    public function getFileName(): ?string
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

    public function getLine(): int
    {
        return $this->getReflection()->getStartLine();
    }

    public function getModifiersString(): string
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

    public function getReturnType(): string
    {
        $type = $this->getReflection()->getReturnType();
        if ($type) {
            $type = (string)$type;
        } else {
            $docBlock = $this->getDocBlock();
            $returnType = $docBlock->getTagsByName('return');
            $type = (string)($returnType[0] ?? 'mixed');
            $type = preg_replace_callback(['/({)([^{}]*)(})/', '/(\[)([^\[\]]*)(\])/'], function ($condition) {
                return str_replace(' ', '', $condition[0]);
            }, $type);
            $type = explode(' ', $type)[0];
        }
        return $type;
    }

    /**
     * @param \phpDocumentor\Reflection\DocBlock\Tags\Param[] $params
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

    public function getParameters(): array
    {
        $parameters = [];
        $docBlock = $this->getDocBlock();

        /**
         * @var \phpDocumentor\Reflection\DocBlock\Tags\Param[] $params
         */
        $params = $docBlock->getTagsByName('param');
        $typesFromDoc = $this::parseAnnotationParams($params);
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
                'type' => $type,
                'expectedType' => $expectedType,
                'name' => $name,
                'defaultValue' => $defaultValue,
                'description' => $description,
            ];
        }
        return $parameters;
    }

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
        return $this->getImplementingClassName() !== $this->reflectionClass->getName();
    }

    public function getImplementingClassName(): string
    {
        return $this->getImplementingReflectionClass()->getName();
    }

    public function getDescription(): string
    {
        $docBlock = $this->getDocBlock();
        return trim($docBlock->getSummary());
    }

    public function isInitialization(): bool
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
}
