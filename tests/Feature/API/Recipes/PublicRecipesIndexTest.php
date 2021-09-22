<?php

namespace Tests\Feature\API\Recipes;

use App\Http\Resources\RecipeResource;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class PublicRecipesIndexTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;
    protected Collection $recipes;
    protected string $route;

    protected function setUp(): void
    {
        parent::setUp();

        /** @var User $user */
        $user = User::factory()->create();
        $this->user = $user;

        /** @var Collection $recipes */
        $recipes = Recipe::factory()->count(10)->for($user, 'author')->create();
        $this->recipes = $recipes;

        $this->route = route('api.recipes.index');
    }

    /** @test */
    public function it_tests_a_user_can_get_recipes_index_count(): void
    {
        $response = $this->actingAs($this->user)->getJson($this->route);

        $response->assertSuccessful();

        // 🛑 - It is OK, but not enough
        $response->assertJsonCount(10, 'data');
    }

    /** @test */
    public function it_tests_a_user_can_get_recipes_index_assert_structure(): void
    {
        $response = $this->actingAs($this->user)->getJson($this->route);

        $response->assertSuccessful();

        // 🛑 Easy to understand, but complex to remind how to write it.
        $response->assertJsonStructure([
            'data' => [
                '*' => ['id', 'title', 'content']
            ]
        ]);
    }

    /** @test */
    public function it_tests_a_user_can_get_recipes_index_assert_nest_content(): void
    {
        $response = $this->actingAs($this->user)->getJson($this->route);

        $response->assertSuccessful();

        // 🛑 - It tests only a response nested object
        $response->assertJsonFragment([
            'title' => $this->recipes->first()->title,
        ]);
    }

    /** @test */
    public function it_tests_a_user_can_get_recipes_index_assert_nest_content_in_order(): void
    {
        $response = $this->actingAs($this->user)->getJson($this->route);

        $response->assertSuccessful();

        // 🛑 - Does not provide enough confidence
        $response->assertSeeInOrder([
            'title' => $this->recipes->first()->title,
            'title' => $this->recipes->last()->title,
        ]);
    }

    /** @test */
    public function it_tests_a_user_can_get_recipes_index_assert_count_and_first_item(): void
    {
        $response = $this->actingAs($this->user)->getJson($this->route);

        $response->assertSuccessful();

        // 🛑 - Very useful, but only fully tests the first element
        $response->assertJson(fn(AssertableJson $json) =>
            $json->has('data', 10)
                ->has('data.0', fn (AssertableJson $json) =>
                    $json->where('id', $this->recipes->last()->id)
                        ->whereType('id', 'integer')
                        ->where('title', $this->recipes->last()->title)
                        ->whereType('title', 'string')
                        ->where('content', $this->recipes->last()->content)
                        ->whereType('content', 'string')
                        ->etc()
                )
        );
    }

    /** @test */
    public function it_tests_a_user_can_get_recipes_index_assert_count_and_first_item_and_last_item(): void
    {
        $response = $this->actingAs($this->user)->getJson($this->route);

        $response->assertSuccessful();

        // 🛑 - Test first & last item, but not all the response
        $response->assertJson(fn(AssertableJson $json) =>
        $json->has('data', 10)
            ->has('data.0', fn (AssertableJson $json) =>
                $json->where('id', $this->recipes->last()->id)
                    ->whereType('id', 'integer')
                    ->where('title', $this->recipes->last()->title)
                    ->whereType('title', 'string')
                    ->where('content', $this->recipes->last()->content)
                    ->whereType('content', 'string')
                    ->etc()
                )
            ->has('data.9', fn (AssertableJson $json) =>
                $json->where('id', $this->recipes->first()->id)
                    ->whereType('id', 'integer')
                    ->where('title', $this->recipes->first()->title)
                    ->whereType('title', 'string')
                    ->where('content', $this->recipes->first()->content)
                    ->whereType('content', 'string')
                    ->etc()
                )
        );
    }

    /** @test */
    public function it_tests_a_user_can_get_recipes_index_assert_count_and_all_items(): void
    {
        $response = $this->actingAs($this->user)->getJson($this->route);

        $response->assertSuccessful();

        // 🛑 - Test every item of the request, but at a performance cost
        $this->recipes->reverse()->each(function (Recipe $recipe, $key) use ($response) {

            $key = (count($this->recipes) - $key) - 1; // as collection return in "latest" order

            $response->assertJson(function(AssertableJson $json) use ($key, $recipe) {
                $json->has("data.{$key}", fn (AssertableJson $json) =>
                $json->where('id', $recipe->id)
                    ->where('title', $recipe->title)
                    ->where('content', $recipe->content)
                    ->where('author', [
                        'id' => $recipe->author->id,
                        'name' => $recipe->author->name,
                    ])
                    ->etc()
                );
            });

        });
    }

    /** @test */
    public function it_tests_a_user_can_get_recipes_index_conveniently(): void
    {
        $response = $this->actingAs($this->user)->getJson($this->route);

        $response->assertSuccessful();

        $resource = RecipeResource::collection($this->recipes->reverse()->load('author'));

        // ✅ - Check all the response content and structure as an exact JSON
        // Easily, flexible and with a good performance.
        $response->assertResource($resource);
    }
}
