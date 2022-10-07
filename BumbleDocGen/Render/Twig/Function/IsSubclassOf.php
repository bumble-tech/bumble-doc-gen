<?php

declare(strict_types=1);

namespace BumbleDocGen\Render\Twig\Function;

/**
 * Checks if the object has this class as one of its parents or implements it
 *
 * @see https://www.php.net/manual/en/function.is-subclass-of.php
 */
final class IsSubclassOf
{
    /**
     * @param mixed $objectOrClass A class name or an object instance. No error is generated if the class does not exist.
     * @param string $class The class name
     * @return bool
     */
    public function __invoke(mixed $objectOrClass, string $class): bool
    {
        return is_subclass_of($objectOrClass, $class);
    }
}
