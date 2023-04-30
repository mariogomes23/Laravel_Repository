<?php

namespace App\Providers;

use App\Repositories\IProdutoRepository;
use App\Repositories\ProdutoRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //

       $this->app->bind(IProdutoRepository::class,ProdutoRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
