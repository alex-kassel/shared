<?php

if (!function_exists('contains')) {
    function contains(
        string $haystack,
        $needles
    ): bool {
        $needles = (array) $needles;

        foreach ($needles as $needle) {
            $regex = '/^' . str_replace(['%', '_'], ['.*', '.'], preg_quote($needle, '/')) . '$/i';
            if (preg_match($regex, $haystack)) {
                return true;
            }
        }

        return false;
    }
}

