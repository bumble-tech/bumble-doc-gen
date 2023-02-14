<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\Entity;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Parser\ParserHelper;
use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflection\ReflectionMethod;
use phpDocumentor\Reflection\DocBlock\Tags\Method;

/**
 * Method obtained by parsing the "method" annotation
 */
class DynamicMethodEntity implements MethodEntityInterface
{
    private function __construct(
        private ConfigurationInterface $configuration,
        private ClassEntity            $classEntity,
        private Method                 $annotationMethod
    )
    {
    }

    public static function createByAnnotationMethod(
        ClassEntity $classEntity,
        Method      $annotationMethod
    ): DynamicMethodEntity
    {
        $dynamicMethodEntity = new static($classEntity->getConfiguration(), $classEntity, $annotationMethod);
        $dynamicMethodEntity->getCallMethod();
        return $dynamicMethodEntity;
    }

    public function getClassEntity(): ClassEntity
    {
        return $this->classEntity;
    }

    #[Cache\CacheableMethod] public function getName(): string
    {
        return $this->annotationMethod->getMethodName();
    }

    #[Cache\CacheableMethod] public function isStatic(): bool
    {
        return $this->annotationMethod->isStatic();
    }

    /**
     * @throws \Exception
     */
    private function getCallMethod(): ReflectionMethod
    {
        if ($this->isStatic()) {
            $callMethod = $this->classEntity->getReflection()->getMethod('__callStatic');
        } else {
            $callMethod = $this->classEntity->getReflection()->getMethod('__call');
        }
        return $callMethod;
    }

    #[Cache\CacheableMethod] public function getFileName(): ?string
    {
        $fullFileName = $this->getImplementingReflectionClass()->getFileName();
        if (!$fullFileName || !str_starts_with($fullFileName, $this->configuration->getProjectRoot())) {
            return null;
        }

        return str_replace(
            $this->configuration->getProjectRoot(),
            '',
            $fullFileName
        );
    }

    #[Cache\CacheableMethod] public function getStartLine(): int
    {
        $callMethod = $this->getCallMethod();
        return $callMethod->getStartLine();
    }

    #[Cache\CacheableMethod] public function getEndLine(): int
    {
        $callMethod = $this->getCallMethod();
        return $callMethod->getEndLine();
    }

    #[Cache\CacheableMethod] public function getModifiersString(): string
    {
        $modifiersString = [];
        $modifiersString[] = 'public';
        if ($this->isStatic()) {
            $modifiersString[] = 'static';
        }
        $modifiersString[] = 'function';
        return implode(' ', $modifiersString);
    }

    #[Cache\CacheableMethod] public function getReturnType(): string
    {
        $returnType = (string)$this->annotationMethod->getReturnType();
        $returnType = ltrim($returnType, '\\');
        if (!str_contains($returnType, '\\')) {
            $uses = ParserHelper::getUsesList($this->classEntity->getReflection());
            if (isset($uses[$returnType])) {
                $returnType = $uses[$returnType];
            } else {
                $newClassName = "{$this->classEntity->getReflection()->getNamespaceName()}\\{$returnType}";
                if (ParserHelper::isClassLoaded($this->classEntity->getReflector(), $newClassName)) {
                    $returnType = $newClassName;
                }
            }
        }
        return $returnType;
    }

    #[Cache\CacheableMethod] public function getParameters(): array
    {
        $parameters = [];
        if ($this->annotationMethod->getArguments()) {
            foreach ($this->annotationMethod->getArguments() as $argument) {
                $var = array_map('trim', explode('=', $argument['name']));
                $parameters[] = [
                    'name' => $var[0],
                    'type' => (string)($argument['type'] ?? ''),
                    'description' => (string)($argument['description'] ?? ''),
                    'defaultValue' => $var[1] ?? null,
                ];
            }
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

    public function getImplementingReflectionClass(): ReflectionClass
    {
        $callMethod = $this->getCallMethod();
        return $callMethod->getImplementingClass();
    }

    #[Cache\CacheableMethod] public function getImplementingClassName(): string
    {
        return $this->getImplementingReflectionClass()->getName();
    }

    #[Cache\CacheableMethod] public function getDescription(): string
    {
        return (string)$this->annotationMethod->getDescription();
    }

    #[Cache\CacheableMethod] public function isInitialization(): bool
    {
        $initializationReturnTypes = [
            'self',
            'static',
            'this',
            $this->getImplementingReflectionClass()->getName(),
            $this->getImplementingReflectionClass()->getShortName(),
        ];
        return $this->isStatic() && in_array($this->getReturnType(), $initializationReturnTypes);
    }

    public function getImplementingClass(): ClassEntity
    {
        return $this->classEntity;
    }

    public function getShortName(): string
    {
        return $this->getName();
    }

    public function getNamespaceName(): string
    {
        return $this->getClassEntity()->getNamespaceName();
    }

    public function isPublic(): bool
    {
        return true;
    }

    public function isProtected(): bool
    {
        return false;
    }

    public function isPrivate(): bool
    {
        return false;
    }

    public function isDynamic(): bool
    {
        return true;
    }

    public function getFirstReturnValue(): mixed
    {
        return null;
    }

    public function getBodyCode(): string
    {
        return '';
    }
}
