<?php

use App\Actions\PostsIndexAction;
use App\Actions\PostsStoreAction;

$app->get('/posts', PostsIndexAction::class);
$app->post('/posts', PostsStoreAction::class);
