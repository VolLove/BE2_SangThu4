<?php

namespace App\Providers;

use App\Models\Categories;
use App\Models\Manufacturer;
use Illuminate\Support\Facades\DB;
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
        $categories = DB::table('categories')
            ->join('products', 'categories.id', '=', 'products.categories_id')
            ->select('categories.*')
            ->groupBy('categories.id')
            ->havingRaw('COUNT(products.id) > 0')
            ->get();;
        $manufacturer = DB::table('manufacturers')
            ->join('products', 'manufacturers.id', '=', 'products.manufacturer_id')
            ->select('manufacturers.*')
            ->groupBy('manufacturers.id')
            ->havingRaw('COUNT(products.id) > 0')
            ->get();;
        view()->share('ListCategories', $categories);
        view()->share('ListManufacturer', $manufacturer);
    }
}