<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser;

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\InterfaceType;
use Nette\PhpGenerator\Parameter;
use Nette\PhpGenerator\TraitType;
use Psr\Log\LoggerInterface;
use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflector\Reflector;

/**
 * @internal
 */
final class FakeClassLoader
{
    private array $classBodyHandlers = [];

    public function __construct(private Reflector $reflector, private LoggerInterface $logger)
    {
    }

    private function copyReflectionClassMethodsToClassType(
        ClassType|InterfaceType|TraitType $class,
        ReflectionClass $reflection
    ): void {
        foreach ($reflection->getMethods() as $method) {
            $classMethod = $class->addMethod($method->getName());
            $classMethod->addBody($method->getBodyCode());
            $classMethod->setStatic($method->isStatic());
            $classMethod->setVariadic($method->isVariadic());
            $parameters = [];
            foreach ($method->getParameters() as $parameter) {
                $parameter = new Parameter($parameter->getName());
                $parameter->setDefaultValue($parameter->getDefaultValue());
                $parameters[] = $parameter;
            }
            $classMethod->setParameters($parameters);
        }
    }

    private function copyReflectionClassConstantsToClassType(
        ClassType|InterfaceType|TraitType $class,
        ReflectionClass $reflection
    ): void {
        foreach ($reflection->getConstants() as $constantName => $constantValue) {
            $class->addConstant($constantName, $constantValue);
        }
    }

    private function copyReflectionClassPropertiesToClassType(
        ClassType|InterfaceType|TraitType $class,
        ReflectionClass $reflection
    ): void {
        foreach ($reflection->getProperties() as $property) {
            $class->addProperty($property->getName(), $property->getDefaultValue());
        }
    }

    public function addClassBodyHandler(callable $handler): void
    {
        $this->classBodyHandlers[] = $handler;
    }

    public function loadClass(
        string $fullClassName,
        bool $isAttribute = false
    ): bool {
        static $loadedClasses = [];
        if (!isset($loadedClasses[$fullClassName])) {
            $loadedClasses[$fullClassName] = 1;
            try {
                $parts = explode('\\', $fullClassName);
                $className = array_pop($parts);

                $namespace = new \Nette\PhpGenerator\PhpNamespace(implode('\\', $parts));

                $classReflection = $this->reflector->reflectClass($fullClassName);
                if ($classReflection->isInterface()) {
                    $class = $namespace->addInterface($className);
                } else {
                    $class = $namespace->addClass($className);
                }

                try {
                    if ($isAttribute && $classReflection->isInstantiable()) {
                        $class->addComment('@Annotation');
                        $class->addAttribute('Attribute');
                    }
                    $parentClassNames = $classReflection->getParentClassNames();

                    self::copyReflectionClassPropertiesToClassType($class, $classReflection);
                    self::copyReflectionClassMethodsToClassType($class, $classReflection);
                    self::copyReflectionClassConstantsToClassType($class, $classReflection);
                } catch (\Exception $e) {
                    $this->logger->error($e->getMessage());
                    $parentClassNames = [];
                }

                $class->removeConstant('__parentClassNames');
                $class->addConstant('__parentClassNames', $parentClassNames);
                $classBody = (string)$namespace;
                foreach ($this->classBodyHandlers as $classBodyHandler) {
                    $classBody = $classBodyHandler($namespace->getName() . '\\' . $class->getName(), $classBody);
                }
                eval($classBody);
                return true;
            } catch (\Exception $e) {
                $this->logger->error($e->getMessage());
            }
        }
        return false;
    }
}
