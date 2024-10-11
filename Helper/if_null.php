<?php

if(!function_exists('if_null')) {
    function if_null(mixed ...$arguments): mixed {
        foreach ($arguments as $argument) {
            if (!is_null($argument)) {
                return $argument;
            }
        }

        return null;
    }
}
