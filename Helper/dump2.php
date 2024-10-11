<?php

declare(strict_types=1);

if(!function_exists('dump2')) {
    function dump2(string $message, ...$vars) {
        if (request('km') == '500') {
            Dump2::dump($message, ...$vars);
        }
    }
}

class Dump2
{
    protected static $instance;
    protected float $lastCallMicroTime;

    private function __construct() {}

    public static function dump(string $message, ...$vars): void
    {
        $obj = static::$instance ??= new static;

        $message = sprintf('%s (%s) - %s',
            round($fromStart = ($now = microtime(true)) - LARAVEL_START, 4),
            round($now - ($obj->lastCallMicroTime ?? LARAVEL_START), 4),
            $message,
        );

        $obj->lastCallMicroTime = $now;

        dump($message, ...$vars);
    }
};
