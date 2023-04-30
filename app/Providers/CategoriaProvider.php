<?php

namespace App\Providers;

use App\Models\Categoria;
use App\Repositories\CategoriaRepository;
use App\Repositories\ICategoriaRepository;
use Illuminate\Support\ServiceProvider;

class CategoriaProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(ICategoriaRepository::class,CategoriaRepository::class);
        $this->app->bind(ICategoriaRepository::class,function(){
            return new CategoriaRepository(new Categoria());
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
