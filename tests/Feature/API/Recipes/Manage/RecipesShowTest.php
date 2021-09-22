<?php

namespace Tests\Feature\API\Recipes;

use App\Http\Resources\RecipeResource;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class RecipesShowTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;
    protected Recipe $recipe;
    protected string $route;

    protected function setUp(): void
    {
        parent::setUp();
        /** @var User $user */
        $user = User::factory()->create();
        $this->user = $user;

        $content = 'Alice, very loudly and decidedly, and there was Mystery,\' the Mock Turtle sang this, very slowly and sadly:-- \'"Will you walk a little before she gave one sharp kick, and waited to see some meaning." in specified order..';
        /** @var Recipe $recipe */
        $recipe = Recipe::factory()->for($user, 'author')->create(compact('content'));
        $this->recipe = $recipe;

        $this->route = route('api.manage.recipes.show', $this->recipe);
    }

    /** @test */
    public function unnecessary_headers_hard_code_routes_repeated_potentially_local_variables(): void
    {
        // 🛑 - unnecessary temporal variable
        /** @var User $user */
        $user = User::factory()->create();

        // 🛑 - unnecessary temporal variable
        /** @var Recipe $recipe */
        $recipe = Recipe::factory()->for($user, 'author')->create();

        // 🛑 - unnecessary set headers & hard coded url
        $response = $this->actingAs($user)
            ->withHeaders(['Accept' => 'application/json'])
            ->get( config('app.url') ."/api/manage/recipes/{$recipe->id}");

        $response->assertSuccessful();
    }

    /** @test */
    public function it_tests_a_user_can_get_a_recipe_testing_response_nested_content(): void
    {
        $response = $this->actingAs($this->user)->getJson($this->route);

        $response->assertSuccessful();
        $response->assertJsonFragment(['id' => $this->recipe->id]);
        $response->assertJsonFragment(['title' => $this->recipe->title]);
        $response->assertJsonFragment(['content' => $this->recipe->content]);

        // 🛑 - assertJsonFragment does not support the dot notation, but you can use assertJsonPath
//        $response->assertJsonFragment(['author.id' => $this->user->id]);
//        $response->assertJsonFragment(['author.name' => $this->user->name]);
    }

    /** @test */
    public function it_tests_a_user_can_get_a_recipe_deep_nested_content(): void
    {
        $response = $this->actingAs($this->user)->getJson($this->route);

        $response->assertSuccessful();

        // 🛑 - useful to test partial content, but not provide full confidence
        $response->assertJsonPath('data.id', $this->recipe->id);
        $response->assertJsonPath('data.title', $this->recipe->title);
        $response->assertJsonPath('data.content', $this->recipe->content);
        $response->assertJsonPath('data.author.id', $this->user->id);
        $response->assertJsonPath('data.author.name', $this->user->name);
    }

    /** @test */
    public function it_tests_a_user_can_get_a_recipe_testing_response_content_in_order(): void
    {
        $response = $this->actingAs($this->user)->getJson($this->route);

        $response->assertSuccessful();

        // 🛑 - It does not pass when faker realText returns an escaped string in content key
//        $response->assertSeeInOrder([
//            $this->recipe->id,
//            $this->recipe->title,
//            $this->recipe->content,
//            $this->user->id,
//            $this->user->name
//        ]);

        // 🛑 - It passes escape HTML entities but not backslashes escaped by quotes
//        $response->assertSeeInOrder([
//            $this->recipe->id,
//            $this->recipe->title,
//            $this->recipe->content,
//            $this->user->id,
//            $this->user->name,
//        ], false);

        // ✅ - It always passes, json_decode escapes text
        // 🛑 - Take care about faker name(), realText() and other methods.
        $response->assertSeeInOrder([
            $this->recipe->id,
            $this->recipe->title,
            json_decode($this->recipe->content),
            $this->user->id,
            $this->user->name]
        );
    }

    /** @test */
    public function it_tests_a_user_can_get_a_recipe_testing_response_structure(): void
    {
        $response = $this->actingAs($this->user)->getJson($this->route);

        $response->assertSuccessful();

        // 🛑 - Lack of confident
        $response->assertJsonStructure([
            'data' => [
                'id', 'title', 'content', 'author'
            ]
        ]);
    }

    /** @test */
    public function it_tests_a_user_can_get_a_recipe_testing_response_content_and_structure_but_tight_to_a_json_structure(): void
    {
        $response = $this->actingAs($this->user)->getJson($this->route);

        $response->assertSuccessful();
        // 🛑 - It tests a complete or incomplete JSON
        // Passes if the resource add more keys, BUT DOES NOT PASS IF IT REMOVES KEYS
        $response->assertJson([
            'data' => [
                'id' => $this->recipe->id,
                'title' => $this->recipe->title,
                'content' => $this->recipe->content,
            ]
        ]);

        // 🛑 - False confidence the structure is hardcoded
        // If response change in the future a lot of tests with this type of assertions are going to fail
        $response->assertJson([
            'data' => [
                'id' => $this->recipe->id,
                'title' => $this->recipe->title,
                'content' => $this->recipe->content,
                'author' => [
                    'id' => $this->user->id,
                    'name' => $this->user->name,
                ]
            ]
        ]);
    }

    /** @test */
    public function it_tests_a_user_can_get_a_recipe_testing_response_content_and_structure_in_a_more_granular_way(): void
    {
        $response = $this->actingAs($this->user)->getJson($this->route);

        $response->assertSuccessful();

        // 🛑 - Assertable Json callback helps to test value and type of some item in the response
        // BUT IT IS TIGHT TO A SPECIFIC STRUCTURE TOO
        $response->assertJson(fn (AssertableJson $json) => $json->has('data', fn (AssertableJson $json) =>
            $json->where('id', $this->recipe->id)
                ->whereType('id', 'integer')
                ->where('title', $this->recipe->title)
                ->whereType('title', 'string')
                ->where('content', $this->recipe->content)
                ->whereType('content', 'string')
                ->etc()
            )
        );
    }

    /** @test */
    public function it_tests_a_user_can_get_a_recipe_testing_all_the_resource_conveniently(): void
    {
        $response = $this->actingAs($this->user)->getJson($this->route);
        $response->assertSuccessful();
        $resource = RecipeResource::make($this->recipe->load('author'));

        // ✅ - It tests all the response in an easy, flexible and performant way.
        $response->assertResource($resource);
    }
}
