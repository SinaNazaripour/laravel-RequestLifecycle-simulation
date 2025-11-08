<?php

namespace App\Providers;

use App\Application;

class ExapmpleServiceProvider
{
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function register()
    {
        $this->app->bind('example.service', function () {
            return new class {
                public function sayHello()
                {
                    echo "Hello from service 1";
                }
            };
        });
    }

    public function boot()
    {
        // echo "boot from serviceProvider 1";
    }
}
