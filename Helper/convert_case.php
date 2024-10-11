<?php

use Illuminate\Support\Str;

if (!function_exists('convert_case')) {
    function convert_case(
        string|iterable|object $subject,
        string $case
    ): string|iterable|object {
        $cases = [
            'lower' => 'lowercase',
            'upper' => 'UPPERCASE',
            'kebab' => 'kebab-case',
            'snake' => 'snake_case',
            'studly' => 'StudlyCase',
            'camel' => 'camelCase',
        ];

        if (!in_array($case, array_keys($cases))) {
            return $subject;
        }

        if (is_iterable($subject)) {
            $result = [];
            foreach ($subject as $key => $value) {
                $newKey = is_string($key) ? Str::$case($key) : $key;
                $result[$newKey] = is_iterable($value) || is_object($value) ? convert_case($value, $case) : $value;
            }
            return $result;
        }

        if (is_object($subject)) {
            $newObject = new stdClass();
            foreach (get_object_vars($subject) as $property => $value) {
                $newProperty = is_string($property) ? Str::$case($property) : $property;
                $newObject->$newProperty = is_iterable($value) || is_object($value) ? convert_case($value, $case) : $value;
            }
            return $newObject;
        }

        return $subject;
    }
}
