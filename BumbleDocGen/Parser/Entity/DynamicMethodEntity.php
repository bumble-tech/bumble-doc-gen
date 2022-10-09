<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser\Entity;

use BumbleDocGen\ConfigurationInterface;
use BumbleDocGen\Parser\ParserHelper;
use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflection\ReflectionMethod;
use Roave\BetterReflection\Reflector\Reflector;
use phpDocumentor\Reflection\DocBlock\Tags\Method;

/**
 * Method obtained by parsing the "method" annotation
 */
final class DynamicMethodEntity implements MethodEntityInterface
{
    private function __construct(
        private ConfigurationInterface $configuration,
        private Reflector $reflector,
        private ReflectionClass $reflectionClass,
        private Method $annotationMethod
    ) {
    }

    public static function createByAnnotationMethod(
        ConfigurationInterface $configuration,
        Reflector $reflector,
        ReflectionClass $reflectionClass,
        Method $annotationMethod
    ): DynamicMethodEntity {
        $dynamicMethodEntity = new DynamicMethodEntity($configuration, $reflector, $reflectionClass, $annotationMethod);
        $dynamicMethodEntity->getCallMethod();
        return $dynamicMethodEntity;
    }

    public function getName(): string
    {
        return $this->annotationMethod->getMethodName();
    }

    public function isStatic(): bool
    {
        return $this->annotationMethod->isStatic();
    }

    /**
     * @throws \Exception
     */
    private function getCallMethod(): ReflectionMethod
    {
        if ($this->isStatic()) {
            $callMethod = $this->reflectionClass->getMethod('__callStatic');
        } else {
            $callMethod = $this->reflectionClass->getMethod('__call');
        }
        return $callMethod;
    }

    public function getFileName(): ?string
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

    public function getLine(): int
    {
        $callMethod = $this->getCallMethod();
        return $callMethod->getStartLine();
    }

    public function getModifiersString(): string
    {
        $modifiersString = [];
        $modifiersString[] = 'public';
        if ($this->isStatic()) {
            $modifiersString[] = 'static';
        }
        $modifiersString[] = 'function';
        return implode(' ', $modifiersString);
    }

    public function getReturnType(): string
    {
        $returnType = (string)$this->annotationMethod->getReturnType();
        $returnType = ltrim($returnType, '\\');
        if (!str_contains($returnType, '\\')) {
            $uses = ParserHelper::getUsesList($this->reflectionClass);
            if (isset($uses[$returnType])) {
                $returnType = $uses[$returnType];
            } else {
                $newClassName = "{$this->reflectionClass->getNamespaceName()}\\{$returnType}";
                if (ParserHelper::isClassLoaded($this->reflector, $newClassName)) {
                    $returnType = $newClassName;
                }
            }
        }
        return $returnType;
    }

    public function getParameters(): array
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

    public function getParametersString(): string
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

    public function getImplementingClassName(): string
    {
        return $this->getImplementingReflectionClass()->getName();
    }

    public function getDescription(): string
    {
        return (string)$this->annotationMethod->getDescription();
    }

    public function isInitialization(): bool
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

    public function isDynamic(): bool
    {
        return true;
    }
}
