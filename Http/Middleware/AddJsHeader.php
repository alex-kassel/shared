<?php

declare(strict_types=1);

namespace Shared\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AddJsHeader
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        return $response->header('Content-Type', 'application/javascript');
    }
}
