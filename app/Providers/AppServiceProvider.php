<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Grids\DoctorGridInterface;
use App\Grids\DoctorGrid;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(DoctorGridInterface::class, DoctorGrid::class);
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
