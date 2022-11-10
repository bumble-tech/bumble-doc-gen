<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser;

use Roave\BetterReflection\Reflection\ReflectionClass;
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
            !(bool)preg_match(
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

    public static function isClassLoaded(Reflector $reflector, string $className): bool
    {
        if (self::isBuiltInType($className) || in_array($className, self::getBuiltInClassNames())) {
            return false;
        } elseif (self::checkIsClassName($className)) {
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
        string $searchClassName,
        Reflector $reflector,
        ReflectionClass $reflectionClass,
        bool $extended = true
    ): string {
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
}
