<?php

if (!function_exists('decimal')) {
    function decimal(
        float $amount,
        int $precision = 2
    ): string {
        return number_format($amount, $precision, ',', '.');
    }
}

