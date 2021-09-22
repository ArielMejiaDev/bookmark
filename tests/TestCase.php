<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Http\Resources\Json\JsonResource;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Convert the json resource instance to an array.
     * @param JsonResource $resource
     * @return array
     */
    public function resourceToArray(JsonResource $resource): array
    {
        return json_decode($resource->toJson(), 1);
    }
}
