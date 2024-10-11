<?php

declare(strict_types=1);

namespace Shared\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AddRefererHeader
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $referer = request()->headers->get('referer');

        if (!str_contains($referer ?? '', config('app.url'))) {
            abort(403);
        }

        return $response->header('Refresh', 0);
    }
}
