<?php

namespace App\Http\Middleware;

use Closure;

class ExampleMidlleware2
{

    public function handle($request, Closure $next)
    {
        echo "middleware 2 is running";
        $response = $next($request);
        return $response;
    }
}
