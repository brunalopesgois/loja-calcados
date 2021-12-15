<?php

namespace App\Providers;

use App\Repositories\OrderItems\OrderItemRepository;
use App\Repositories\OrderItems\OrderItemRepositoryEloquent;
use App\Repositories\Orders\OrderRepository;
use App\Repositories\Orders\OrderRepositoryEloquent;
use App\Repositories\Products\ProductRepository;
use App\Repositories\Products\ProductRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProductRepository::class, ProductRepositoryEloquent::class);
        $this->app->bind(OrderRepository::class, OrderRepositoryEloquent::class);
        $this->app->bind(OrderItemRepository::class, OrderItemRepositoryEloquent::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
