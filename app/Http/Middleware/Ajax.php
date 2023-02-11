<?php

namespace App\Http\Middleware;

class Ajax
{
    public function handle($request, \Closure $next)
    {
        if (!$request->ajax())
        {
            return response('Forbidden.', 403);
        }

        return $next($request);
    }
}
