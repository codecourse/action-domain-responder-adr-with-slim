<?php

namespace App\Actions;

use App\Domain\Services\PostIndexService;
use App\Responders\PostIndexResponder;

class PostsIndexAction
{
    protected $responder;

    protected $service;

    public function __construct(PostIndexResponder $responder, PostIndexService $service)
    {
        $this->responder = $responder;
        $this->service = $service;
    }

    public function __invoke()
    {
        return $this->responder->send(
            $this->service->handle()
        );
    }
}
