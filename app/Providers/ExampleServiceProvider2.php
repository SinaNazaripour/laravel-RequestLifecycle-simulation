<?php

namespace App\Providers;

use App\Application;

class ExampleServiceProvider2
{
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function register()
    {
        $this->app->bind('example.service2', function () {
            return new class {
                public function sayHello()
                {
                    echo "Hello from service 2";
                }
            };
        });
    }

    public function boot()
    {
        echo "boot from serviceProvider 2";
    }
}
