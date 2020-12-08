<?php

namespace App\Providers;

use View;
use App\Volume;
use App\Category;
use App\Sh_location;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        View::share([
            'liquour_categories'=>Category::where('status',1)->get(),
            'liquour_volumes'=>Volume::all(),
            'address_locations' => Sh_location::all(),
        ]);    
        \Illuminate\Pagination\LengthAwarePaginator::defaultView('_partials.paginator');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
