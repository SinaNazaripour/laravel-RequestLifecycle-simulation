<?php
require __DIR__ . "/../vendor/autoload.php";

use App\Application;
use App\Http\Request;

$app = new Application;

$kernel = $app->make('HttpKernel');

// $servic1 = $app->make('example.service');
// echo $servic1->sayHello();

$request = new Request();
// echo $request->method();
// echo $request->uri();
$response = $kernel->handle($request);
$response->send();
