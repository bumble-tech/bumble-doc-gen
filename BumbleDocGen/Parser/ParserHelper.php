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
}
