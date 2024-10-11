<?php // 2024-08-20: ChatGPT

if (!function_exists('to_regex')) {
    function to_regex(
        string $sql_like
    ): string {
        return '/^' . str_replace(['%', '_'], ['.*', '.'], preg_quote($sql_like, '/')) . '$/i';
    }
}

