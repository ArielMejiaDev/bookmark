<?php

namespace Tests\Feature\API\Recipes;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class RecipesIndexTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_tests_recipes_can_be_listed(): void
    {
        $user = User::factory()->create();

        $recipes = Recipe::factory()->count(10)->for($user, 'author')->create();

        /** @var Authenticatable $user */
        $response = $this->actingAs($user)->getJson(route('api.recipes.index'));

//        $response->assertSuccessful();

        // assert response count
//        $response->assertJsonCount(10, 'data');

        // assert some response content
//        $response->assertJsonFragment([
//            'title' => $recipes->first()->title,
//        ]);

        // assert response structure
//        $response->assertJsonStructure([
//            'data' => [
//                '*' => [
//                    'id', 'title', 'content'
//                ]
//            ]
//        ]);

        // assert response in specific order
//        $response->assertSeeInOrder([
//            'title' => $recipes->first()->title,
//            'title' => $recipes->last()->title,
//        ]);

        // assert response count, content, structure and type in specific order

//        $response->assertJson(fn(AssertableJson $json) =>
//            $json->has('data', 10)
//                ->has('data.0', fn (AssertableJson $json) =>
//                    $json->where('id', $recipes->last()->id)
//                        ->whereType('id', 'integer')
//                        ->where('title', $recipes->last()->title)
//                        ->whereType('title', 'string')
//                        ->where('content', $recipes->last()->content)
//                        ->whereType('content', 'string')
//                        ->etc()
//                )
//                ->has('data.9', fn (AssertableJson $json) =>
//                    $json->where('id', $recipes->first()->id)
//                        ->whereType('id', 'integer')
//                        ->where('title', $recipes->first()->title)
//                        ->whereType('title', 'string')
//                        ->where('content', $recipes->first()->content)
//                        ->whereType('content', 'string')
//                        ->etc()
//                ),
//        );

        // assert all items from response count, content, structure and type in specific order

// rename maybe to assertCollectionAgainstResource
//        $response->assertCollection();


        $recipes->reverse()->each(function (Recipe $recipe, $key) use ($recipes, $response) {

            $key = (count($recipes) - $key) - 1; // solo si la collection es reverse
            $itemKey = "data.{$key}";

            $response->assertJson(function(AssertableJson $json) use ($itemKey, $recipe) {
                $json->has($itemKey, fn (AssertableJson $json) =>
                    $json->where('id', $recipe->id) // solo falta refactorizar para mandar los parametros por array
                        ->where('title', $recipe->title)
                        ->where('content', $recipe->content)
                        ->etc()
                );
            });

        });

    }
}
