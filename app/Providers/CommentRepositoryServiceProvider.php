<?php
namespace App\Providers;

use App\Repositories\CommentRepository;
use App\Repositories\CommentRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class CommentRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CommentRepositoryInterface::class, CommentRepository::class);
    }
}