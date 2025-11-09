<?php

namespace App\Http;

use App\{Application, Router};
use App\Http\Middleware\{ExampleMidlleware, ExampleMidlleware2};

class Kernel
{
    protected $middleware = [
        ExampleMidlleware::class,
        ExampleMidlleware2::class
    ];
    public function __construct(protected Application $app) {}

    public function handle(Request $request)
    {

        $this->app->boot();

        $this->middleware = array_reverse($this->middleware);
        $pipeline = array_reduce(
            $this->middleware,
            fn($next, $middleware) => fn($request) => (new $middleware)->handle($request, $next),
            fn($request) => (new Router)->dispatch($request)
        );

        return $pipeline($request);
        // return (new Router())->dispatch($request);
    }
}
