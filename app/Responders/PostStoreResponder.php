<?php

namespace App\Responders;

use App\Domain\Messages\ValidationMessage;
use Psr\Http\Message\ResponseInterface;

class PostStoreResponder
{
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    public function send($response)
    {
        if ($response instanceof ValidationMessage) {
            return $this->response->withJson($response->toArray(), 422);
        }

        return $this->response->withJson($response);
    }
}