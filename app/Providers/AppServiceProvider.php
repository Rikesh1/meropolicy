<?php

namespace App\Providers;

use App\Repositories\Contracts\InsuranceTypeRepository;
use App\Repositories\Eloquent\EloquentInsuranceTypeRepository;
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
        $this->app->singleton(InsuranceTypeRepository::class, EloquentInsuranceTypeRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength('191');
    }
}
