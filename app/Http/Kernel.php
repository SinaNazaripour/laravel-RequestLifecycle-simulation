<?php

namespace App\Http;

use App\{Application, Router};

class Kernel
{
    public function __construct(protected Application $app) {}

    public function handle(Request $request)
    {

        $this->app->boot();
        return (new Router())->dispatch($request);
    }
}
