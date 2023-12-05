<?php

declare(strict_types=1);

namespace BumbleDocGen\Core;

if (!function_exists('BumbleDocGen\Core\is_associative_array')) {
    function is_associative_array(array $array): bool
    {
        return count(array_filter(array_keys($array), 'is_string')) > 0;
    }
}

if (!function_exists('BumbleDocGen\Core\get_class_short')) {
    function get_class_short(string $className): string
    {
        $classNameParts = explode('\\', $className);

        return end($classNameParts);
    }
}
