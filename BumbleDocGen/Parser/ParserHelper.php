<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser;

use Nette\PhpGenerator\GlobalFunction;
use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflection\ReflectionMethod;
use Roave\BetterReflection\Reflector\Reflector;

final class ParserHelper
{
    private static array $builtInTypes = [
        'array',
        'int',
        'string',
        'array',
        'bool',
        'boolean',
        'null',
        'mixed',
        'void',
        'self',
        'static',
        'false',
        'true',
        'float',
        'callable',
        '[]',
    ];

    public static function getBuiltInClassNames(): array
    {
        static $classNames = [];
        if (!$classNames) {
            foreach (get_declared_classes() as $className) {
                if (str_starts_with(ltrim($className, '\\'), 'Composer')) {
                    break;
                }
                $classNames[] = $className;
            }
        }
        return $classNames;
    }

    public static function isBuiltInType(string $name): bool
    {
        foreach (self::$builtInTypes as $builtInType) {
            if (str_starts_with($name, $builtInType)) {
                return true;
            }
        }
        return false;
    }

    private static function checkIsClassName(string $name): bool
    {
        if (
            !preg_match(
                '/^(?=_*[A-z]+)[A-z0-9]+$/',
                $name
            )
        ) {
            return false;
        }

        $name = explode('\\', $name);
        $name = end($name);
        $chr = mb_substr($name, 0, 1, "UTF-8");
        return mb_strtolower($chr, "UTF-8") != $chr;
    }

    public static function isCorrectClassName(string $className): bool
    {
        if (self::isBuiltInType($className) || in_array($className, self::getBuiltInClassNames())) {
            return false;
        }
        return self::checkIsClassName($className);
    }

    public static function isClassLoaded(Reflector $reflector, string $className): bool
    {
        if (self::isCorrectClassName($className)) {
            try {
                $reflector->reflectClass($className);
                return true;
            } catch (\Exception) {
            }
        }

        return false;
    }

    public static function getUsesList(ReflectionClass $reflectionClass, bool $extended = true): array
    {
        static $classContentCache = [];
        $fileName = $reflectionClass->getFileName();
        if (!$fileName) {
            return [];
        }
        if (!isset($classContentCache[$fileName])) {
            $classContentCache[$fileName] = file_get_contents($fileName);
        }
        $uses = [];
        if (
            preg_match_all(
                '/(use )(.*)(;)/',
                $classContentCache[$fileName],
                $matches
            )
        ) {
            foreach ($matches[2] as $className) {
                $key = array_reverse(explode('\\', $className))[0];
                $uses[$key] = $className;
            }
        }

        if ($extended) {
            foreach (
                array_merge(
                    $reflectionClass->getParentClassNames(),
                    $reflectionClass->getInterfaceNames()
                ) as $className
            ) {
                $key = array_reverse(explode('\\', $className))[0];
                $uses[$key] = $className;
            }
        }

        return $uses;
    }

    public static function parseFullClassName(
        string          $searchClassName,
        Reflector       $reflector,
        ReflectionClass $reflectionClass,
        bool            $extended = true
    ): string
    {
        static $parsedFullClassNameCache = [];
        $classNameParts = explode('::', $searchClassName);
        $searchClassName = $classNameParts[0];

        $key = $reflectionClass->getName() . $searchClassName;
        if (!isset($parsedFullClassNameCache[$key])) {
            $trimmedName = ltrim($searchClassName, '\\');
            $uses = self::getUsesList($reflectionClass, $extended);
            if (isset($uses[$trimmedName])) {
                $className = $uses[$trimmedName];
            } elseif (isset($uses[$searchClassName])) {
                $className = $uses[$searchClassName];
            } elseif (
                str_contains($searchClassName, '\\') && ParserHelper::isClassLoaded($reflector, $searchClassName)
            ) {
                $className = $searchClassName;
            } elseif (
                !str_starts_with(
                    $searchClassName,
                    '\\' . $reflectionClass->getNamespaceName()
                )
            ) {
                $className = "{$reflectionClass->getNamespaceName()}{$searchClassName}";
                if (!ParserHelper::isClassLoaded($reflector, $className)) {
                    $className = $searchClassName;
                }
            } else {
                $className = $searchClassName;
            }

            $parsedFullClassNameCache[$key] = $className;
        }

        $className = $parsedFullClassNameCache[$key];
        if (isset($classNameParts[1])) {
            $className = "{$className}::$classNameParts[1]";
        }
        return $className;
    }

    public static function getClassFromFile($file): ?string
    {
        if (str_ends_with($file, '.php')) {
            $content = file_get_contents($file);
            $namespaceLevel = false;
            $classLevel = false;
            $namespace = '';
            foreach (token_get_all($content, TOKEN_PARSE) as $token) {
                if ($token[0] === T_NAMESPACE) {
                    $namespaceLevel = true;
                } elseif ($namespaceLevel && in_array($token[0], [T_NAME_QUALIFIED, T_STRING])) {
                    $namespaceLevel = false;
                    $namespace = $token[1];
                }
                if (!$namespaceLevel && in_array($token[0], [T_CLASS, T_INTERFACE, T_TRAIT])) {
                    $classLevel = true;
                } elseif ($classLevel && $token[0] === T_STRING) {
                    return $namespace . '\\' . $token[1];
                }
            }
        }
        return null;
    }

    public static function getMethodReturnValue(
        Reflector        $reflector,
        ReflectionClass  $reflectionClass,
        ReflectionMethod $reflectionMethod
    ): mixed
    {
        if (preg_match('/(return )([^;]+)/', $reflectionMethod->getBodyCode(), $matches)) {
            if (
                str_contains($matches[2], '::') && !str_contains($matches[2], '"') && !str_contains($matches[2], '\'')
            ) {
                try {
                    $nextClass = null;
                    $parts = explode('::', $matches[2]);
                    if ($parts[0] === 'parent') {
                        $nextClass = $reflectionMethod->getImplementingClass()->getParentClass();
                    } elseif ($parts[0] === 'self') {
                        $nextClass = $reflectionMethod->getImplementingClass();
                    } elseif (self::isClassLoaded($reflector, $parts[0])) {
                        $nextClass = $reflector->reflectClass($parts[0]);
                    }

                    if ($nextClass) {
                        if (str_contains($parts[1], '(')) {
                            $methodName = explode('(', $parts[1])[0];
                            $nextReflection = $nextClass->getMethod($methodName);
                            return self::getMethodReturnValue($reflector, $reflectionClass, $nextReflection);
                        } elseif (!preg_match('/([-+:\/ ])/', $parts[1])) {
                            return $nextClass->getConstant($parts[1]);
                        }
                        $reflectionClass = $nextClass;
                    }
                } catch (\Exception) {
                }
            }

            $value = preg_replace_callback(
                '/([$]?)([a-zA-Z_\\\\]+)((::)|(->))([\s\S]([^ -+\-;\]])+)(([^)]?)+[)])?/',
                function (array $matches) use ($reflector, $reflectionClass) {
                    if ($matches[1]) {
                        return $matches[0];
                    }
                    if (substr_count($matches[0], '->') > 1) {
                        return $matches[0];
                    }

                    $nextClass = $reflectionClass;
                    if (!in_array($matches[2], ['static', 'self', 'partner', 'this'])) {
                        $nextClass = $reflector->reflectClass($matches[2]);
                    }

                    if (isset($matches[8])) {
                        return self::getMethodReturnValue($reflector, $nextClass, $nextClass->getMethod($matches[6]));
                    } else {
                        $constantValue = $nextClass->getConstant($matches[6]);
                        return is_string($constantValue) ? "'{$constantValue}'" : $constantValue;
                    }
                },
                trim($matches[2])
            );

            if ($value && !str_contains($value, '::') && !str_contains($value, '$this->')) {
                try {
                    $fName = 'x' . uniqid();
                    $fn = new GlobalFunction($fName);
                    $value = str_replace(['(', ')'], '', $value);
                    $fn->setBody("return {$value};");
                    eval((string)$fn);
                    return $fName();
                } catch (\Exception) {
                }
            }
            return $value;
        }
        return null;
    }
}
