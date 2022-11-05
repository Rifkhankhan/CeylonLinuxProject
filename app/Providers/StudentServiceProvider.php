<?php

namespace App\Providers;

use App\Services\StudentService;
use Illuminate\Support\ServiceProvider;

class StudentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton("student",function(){
            return new StudentService;
        });
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