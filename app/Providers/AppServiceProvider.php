<?php

namespace App\Providers;

use App\Models\Categoria;
use Illuminate\Support\ServiceProvider;
use App\Models\Producto;
use App\Models\Subcategoria;
use App\Observers\UserObserver;
use App\Models\User;
use App\Observers\CategoriaObserver;
use App\Observers\ProductoObserver;
use App\Observers\SubcategoriaObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Producto::observe(ProductoObserver::class);
        Categoria::observe(CategoriaObserver::class);
        Subcategoria::observe(SubcategoriaObserver::class);
    }
}
