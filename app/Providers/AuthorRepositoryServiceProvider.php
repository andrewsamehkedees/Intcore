<?php
namespace App\Providers;

use App\Repositories\AuthorRepository;
use App\Repositories\AuthorRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AuthorRepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(AuthorRepositoryInterface::class, AuthorRepository::class);
    }
}