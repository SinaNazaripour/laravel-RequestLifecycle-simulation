<?php

namespace App\Http\Middleware;

use Closure;

class ExampleMidlleware
{

    public function handle($request, Closure $next)
    {
        echo "middleware 1 is running <br>";
        $response = $next($request);
        return $response;
    }
}
