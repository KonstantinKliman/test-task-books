<?php

namespace App\Providers;

use App\Http\Repositories\AuthorRepository;
use App\Http\Repositories\BookRepository;
use App\Http\Repositories\Interfaces\IAuthorRepository;
use App\Http\Repositories\Interfaces\IBookRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(IBookRepository::class, BookRepository::class);
        $this->app->bind(IAuthorRepository::class, AuthorRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
