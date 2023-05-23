<?php

namespace App\Providers;

use App\Models\Categories;
use App\Models\Manufacturer;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $categories = Categories::all();
        $manufacturer = Manufacturer::all();
        view()->share('ListCategories', $categories);
        view()->share('ListManufacturer', $manufacturer);
    }
}
