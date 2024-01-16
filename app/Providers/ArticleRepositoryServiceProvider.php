<?php
namespace App\Providers;

use App\Repositories\ArticleRepository;
use App\Repositories\ArticleRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class ArticleRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ArticleRepositoryInterface::class, ArticleRepository::class);
    }
}