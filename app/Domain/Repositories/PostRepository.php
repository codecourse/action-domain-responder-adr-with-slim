<?php

namespace App\Domain\Repositories;

use App\Domain\Models\Post;

class PostRepository
{
    public function all()
    {
        return Post::get()->toArray();
    }

    public function create(array $data)
    {
        return Post::create($data)->toArray();
    }
}
