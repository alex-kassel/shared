<?php

if (!function_exists('exec_time')) {
    function exec_time(
        float $start_time_float = 0,
        int $precision = 3
    ): float {
        $elapsed_time = microtime(true) - ($start_time_float ?: $_SERVER['REQUEST_TIME_FLOAT']);
        return round($elapsed_time, $precision);
    }
}

