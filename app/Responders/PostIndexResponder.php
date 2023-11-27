<?php

namespace App\Responders;

use Psr\Http\Message\ResponseInterface;

class PostIndexResponder
{
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    public function send(array $posts)
    {
        return $this->response->withJson($posts);
    }
}