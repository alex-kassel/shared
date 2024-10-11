<?php

if(!function_exists('if_empty')) {
    function if_empty(mixed ...$arguments): mixed {
        foreach ($arguments as $argument) {
            if (!empty($argument)) {
                return $argument;
            }
        }

        return null;
    }
}
