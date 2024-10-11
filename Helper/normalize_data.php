<?php

if (!function_exists('normalize_data')) {
    function normalize_data(iterable|object $data): object {
        return json_decode(json_encode($data));
    }
}
