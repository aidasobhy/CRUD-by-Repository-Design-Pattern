<?php

namespace App\Providers;

use App\Repositories\implementation\PharmacyProductRepository;
use App\Repositories\implementation\PharmacyRepository;
use App\Repositories\implementation\ProductRepository;
use App\Repositories\IPharmacy;
use App\Repositories\IPharmacyProduct;
use App\Repositories\IProduct;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
        $this->app->bind(IProduct::class,ProductRepository::class);
        $this->app->bind(IPharmacy::class,PharmacyRepository::class);
        $this->app->bind(IPharmacyProduct::class,PharmacyProductRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
