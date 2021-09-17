<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Testing\TestResponse;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // a macro to assert by iterating a collection
        TestResponse::macro('assertCollection', function () {
            /** @var $this \Illuminate\Foundation\Testing\TestResponse */
            return $this->assertSuccessful();
        });
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
