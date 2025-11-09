<?php

namespace App\Http\Controllers;

use App\Http\Response;

class HomeController
{

    public function index($request)
    {
        return new Response('home page controller');
    }
}
