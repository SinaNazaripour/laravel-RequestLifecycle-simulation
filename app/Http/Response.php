<?php

namespace App\Http;

class Response
{
    public function __construct(protected $content, protected $status = 200) {}

    public function send()
    {
        http_response_code($this->status);
        echo $this->content;
    }
}
