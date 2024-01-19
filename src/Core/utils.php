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

if (!function_exists('BumbleDocGen\Core\calculate_relative_url')) {
    function calculate_relative_url(string $from, string $to): string
    {
        $from = explode('/', $from);
        $to = explode('/', $to);

        array_pop($from);
        $toFileName = array_pop($to);

        $commonParts = array_intersect_assoc($from, $to);
        $diffFrom = array_diff_assoc($from, $commonParts);

        $wayToCommonPath = implode('/', array_fill(0, count($diffFrom), '..'));
        $diffTo = array_diff_assoc($to, $commonParts);
        $newPath = $diffTo ? implode('/', $diffTo) . '/' . $toFileName : $toFileName;

        return ltrim("{$wayToCommonPath}/{$newPath}", '/');
    }
}
