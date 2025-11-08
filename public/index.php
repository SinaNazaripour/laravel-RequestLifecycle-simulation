<?php
require __DIR__ . "/../vendor/autoload.php";

use App\Application;

$app = new Application;

$kernel = $app->make('HttpKernel');

$servic1 = $app->make('example.service');
echo $servic1->sayHello();

$kernel->handle();
