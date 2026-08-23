<?php

namespace App\Features\Post\Providers;

use App\Features\Post\Repositories\PostRepository;
use App\Features\Post\Repositories\PostRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class PostServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
    }
}
