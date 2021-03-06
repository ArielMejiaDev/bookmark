<?php

namespace App\Providers;

use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }


    public function boot()
    {
        /**
         * Assert that the json response match exactly with a given resource.
         * @return \Illuminate\Testing\TestResponse
         * @instantiated
         */
        \Illuminate\Testing\TestResponse::macro('assertResource', function (\Illuminate\Http\Resources\Json\JsonResource $resource) {

            /** @var \Illuminate\Testing\TestResponse $this */

            if ($resource->resource instanceof AbstractPaginator) {
                return $this->decodeResponseJson()
                    ->assertSubset([
                        'data' => json_decode($resource->toJson(), 1)
                    ]);
            }

            $resource = ['data' => json_decode($resource->toJson(), 1)];
            return $this->assertExactJson($resource);
        });
    }
}
