<?php

namespace App\Providers;

use App\Models\Produto;
use App\Repositories\IProdutoRepository;
use App\Repositories\ProdutoRepository;
use Illuminate\Support\ServiceProvider;

class ProdutoProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(IProdutoRepository::class,ProdutoRepository::class);
        $this->app->bind(IProdutoRepository::class,function(){
            return new ProdutoRepository(new Produto());
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
