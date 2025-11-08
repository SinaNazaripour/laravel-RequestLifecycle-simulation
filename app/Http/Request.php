<?php

namespace App\Http;

class Request
{
    public function method()
    {
        return $_SERVER["REQUEST_METHOD"];
    }

    public function uri()
    {
        return parse_url($_SERVER["REQUEST_URI"] ?? '/', PHP_URL_PATH);
    }
}
