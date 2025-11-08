<?php

namespace App;

use App\Http\Kernel;
use App\Providers\{ExapmpleServiceProvider, ExampleServiceProvider2};

class Application
{
    private array $bindings = [];
    private array $providers = [];

    public function __construct()
    {
        $this->registerBaseBindings();
        $this->registerProviders(new ExapmpleServiceProvider($this));
        $this->registerProviders(new ExampleServiceProvider2($this));
    }

    protected function registerBaseBindings()
    {
        $this->bind('HttpKernel', function () {
            return new Kernel($this);
        });
    }

    public function registerProviders($provider)
    {
        $this->providers[] = $provider;
        $provider->register();
    }

    public function bind($abstract, $concrete)
    {
        $this->bindings[$abstract] = $concrete;
    }

    public function make($abstract)
    {
        if (isset($this->bindings[$abstract])) {
            // return call_user_func($this->bindings[$abstract]);
            return $this->bindings[$abstract]();
        }
    }

    public function boot()
    {
        foreach ($this->providers as $provider) {
            $provider->boot();
        }
    }
}
