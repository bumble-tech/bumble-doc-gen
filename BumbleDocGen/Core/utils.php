<?php

declare(strict_types=1);

namespace BumbleDocGen\Core;

if (!function_exists('BumbleDocGen\Core\is_associative_array')) {
    function is_associative_array(array $array): bool
    {
        return count(array_filter(array_keys($array), 'is_string')) > 0;
    }
}

if (!function_exists('BumbleDocGen\Core\bites_int_to_string')) {
    function bites_int_to_string(int $bites): string
    {
        $i = 0;
        while (floor($bites / 1024) > 0) {
            $i++;
            $bites /= 1024;
        }
        $name = ['bites', 'KB', 'MB'];
        return round($bites, 2) . ' ' . $name[$i];
    }
}
