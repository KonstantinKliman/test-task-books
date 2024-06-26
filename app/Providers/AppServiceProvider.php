<?php

namespace App\Providers;

use App\Http\Services\AuthorService;
use App\Http\Services\BookService;
use App\Http\Services\Interfaces\IAuthorService;
use App\Http\Services\Interfaces\IBookService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IBookService::class, BookService::class);
        $this->app->bind(IAuthorService::class, AuthorService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
