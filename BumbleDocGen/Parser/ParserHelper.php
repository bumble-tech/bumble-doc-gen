<?php

declare(strict_types=1);

namespace BumbleDocGen\Parser;

use Roave\BetterReflection\Reflection\ReflectionClass;
use Roave\BetterReflection\Reflector\Reflector;

final class ParserHelper
{
    public static function isClassLoaded(Reflector $reflector, string $className): bool
    {
        try {
            $reflector->reflectClass($className);
            return true;
        } catch (\Exception) {
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
        return $parsedFullClassNameCache[$key];
    }
}
