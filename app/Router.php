<?php

namespace App;

use App\Http\{Request, Response};

class Router
{
    protected $routes;

    public function __construct()
    {
        $this->routes = [
            'GET' => [
                '/' => ['uses' => fn() => 'response']
            ]
        ];
    }

    public function dispatch(Request $request)
    {
        $method = $request->method();
        $uri = $request->uri();

        if (isset($this->routes[$method][$uri])) {
            $action = $this->routes[$method][$uri]['uses'];
            return (new Response($action($request)));
        }

        return (new Response('404 Not Found', status: 404));
    }
}
