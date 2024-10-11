<?php

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Facades\Log;

if (!function_exists('log_query')) {
    function log_query(
        EloquentBuilder|QueryBuilder $query,
        string $channel = 'sql',
        bool $bindings_included = true,
    ): EloquentBuilder|QueryBuilder {
        if ($bindings_included) {
            Log::channel($channel)->debug(
                vsprintf(
                    str_replace('?', "'%s'", $query->toSql()),
                    $query->getBindings()
                )
            );
        } else {
            Log::channel($channel)->debug($query->toSql(), $query->getBindings());
        }

        return $query;
    }
}

