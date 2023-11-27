<?php

namespace App\Actions;

use App\Domain\Services\PostStoreService;
use App\Responders\PostStoreResponder;
use Psr\Http\Message\RequestInterface;

class PostsStoreAction
{
    protected $responder;

    protected $service;

    public function __construct(PostStoreResponder $responder, PostStoreService $service)
    {
        $this->responder = $responder;
        $this->service = $service;
    }

    public function __invoke(RequestInterface $request)
    {
        return $this->responder->send(
            $this->service->handle($request->getParams())
        );
    }
}
