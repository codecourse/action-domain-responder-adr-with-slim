<?php

namespace App\Domain\Services;

use App\Domain\Repositories\PostRepository;

class PostIndexService
{
    protected $posts;

    public function __construct(PostRepository $posts)
    {
        $this->posts = $posts;
    }

    public function handle()
    {
        return $this->posts->all();
    }
}
