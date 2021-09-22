<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }


    public function boot()
    {
        /** @return \Illuminate\Testing\TestResponse @instantiated */
        \Illuminate\Testing\TestResponse::macro('assertResource', function (\Illuminate\Http\Resources\Json\JsonResource $resource) {
            $resource = ['data' => json_decode($resource->toJson(), 1)];
            /** @var \Illuminate\Testing\TestResponse $this */
            $this->assertExactJson($resource);
        });
    }
}
