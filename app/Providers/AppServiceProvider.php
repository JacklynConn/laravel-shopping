<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
       Schema::defaultStringLength (191);

       view()->composer('frontend.master' , function($view){
        $Logo = DB::table('website_logo')
                ->orderBy('id' , 'DESC')
                ->limit(1)
                ->get();

                return $view->with('Logo' , $Logo);
       });
    }
}
