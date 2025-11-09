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
                '/' => ['uses' =>  'HomeController@index']
            ]
        ];
    }

    public function dispatch(Request $request)
    {
        $method = $request->method();
        $uri = $request->uri();

        if (isset($this->routes[$method][$uri])) {
            [$controller, $function] = explode('@', $this->routes[$method][$uri]['uses']);
            $controller = "App\\Http\\Controllers\\{$controller}";
            return ((new $controller)->$function($request));
        }

        return (new Response('404 Not Found', status: 404));
    }
}
