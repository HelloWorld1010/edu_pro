<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        //自定义分页样式
        //Paginator::defaultView('vendor.pagination.xamdin-tailwind');
        //Bootstrap样式分页
        Paginator::useBootstrap();
    }
}
