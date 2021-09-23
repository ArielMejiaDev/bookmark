<?php

namespace Tests\Feature\API\Recipes;

use App\Http\Requests\Web\RecipeRequest;
use App\Http\Resources\RecipeResource;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CreateRecipeTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;
    protected string $route;
    protected array $validationRules;

    protected function setUp(): void
    {
        parent::setUp();

        $this->route = route('api.manage.recipes.store');

        /** @var User $user */
        $user = User::factory()->create();
        $this->user = $user;

        // 💎 Hidden Gem
        // if RecipeRequest rules array change at least this changes apply dynamically here
        $this->validationRules = array_keys((new RecipeRequest)->rules());
    }

    /** @test */
    public function it_tests_a_non_authenticated_request_cannot_create_a_recipe(): void
    {
        $response = $this->postJson($this->route, [
            'thumbnail' => 1
        ]);

        $response->assertStatus(401);

        // 💎 Hidden Gem
        // Use the class fqcn instead of a string with the name of the table, is flexible and avoid magic number issues
        $this->assertDatabaseCount(Recipe::class, 0);
    }

    /** @test */
    public function it_tests_a_non_authenticated_request_cannot_create_a_recipe_conveniently(): void
    {
        $response = $this->postJson($this->route, [
                'thumbnail' => 1
            ]);

        // 💎 Hidden Gem
        // Use this helper instead of hard coding response status code 401
        $response->assertUnauthorized();

        $this->assertDatabaseCount(Recipe::class, 0);
    }

    /** @test */
    public function it_tests_a_user_cannot_create_a_recipe_with_invalid_data(): void
    {
        $response = $this->actingAs($this->user)
            ->postJson($this->route, [
                'thumbnail' => 1
            ]);

        $response->assertJsonValidationErrors($this->validationRules);

        $this->assertDatabaseCount(Recipe::class, 0);
    }

    /** @test */
    public function it_tests_a_user_cannot_create_a_recipe_with_invalid_data_improved(): void
    {
        $response = $this->actingAs($this->user)
            ->postJson($this->route, [
                'thumbnail' => 1
            ]);

        // 💎 Hidden Gem
        // This helper assert invalid fields no matter if the validation error comes from session or from an API
        $response->assertInvalid($this->validationRules);

        $response->assertUnprocessable();

        $this->assertDatabaseCount(Recipe::class, 0);
    }

    /** @test */
    public function it_tests_a_user_cannot_upload_a_recipe_thumbnail_with_invalid_data(): void
    {
        Storage::fake('avatars');

        $response = $this->actingAs($this->user)
            ->postJson($this->route, [
                'thumbnail' => UploadedFile::fake()->image('avatar.png'),
            ]);

        unset($this->validationRules[
            array_search('thumbnail', $this->validationRules)
        ]);

        $response->assertUnprocessable();

        $response->assertInvalid($this->validationRules);
    }

    /** @test */
    public function it_tests_a_user_can_create_a_recipe(): void
    {
        $recipe = Recipe::factory()->for($this->user, 'author')->raw();

        $response = $this->actingAs($this->user)
            ->postJson($this->route, $recipe);

        // 💎 Hidden Gem
        // database count accepts model fqcn instead of table name string
        // helpful when app use multiple db connections or model override the protected property table
        $this->assertDatabaseCount(Recipe::class, 1);

        $resource = RecipeResource::make(Recipe::query()->first()->load('author'));
        $response->assertSuccessful()->assertResource($resource);
    }

    /** @test */
    public function it_tests_a_user_can_create_a_recipe_and_it_persists(): void
    {
        $recipe = Recipe::factory()->for($this->user, 'author')->raw();

        $response = $this->actingAs($this->user)
            ->postJson($this->route, $recipe);

        $response->assertSuccessful();

        // 💎 Hidden Gem
        // Timestamps format on db differs from model timestamps.
        // to assert easily that the model exists just hide the timestamps
        $this->assertDatabaseHas(
            Recipe::class,
            Recipe::query()->first()->makeHidden('created_at', 'updated_at')->toArray()
        );
    }

    /** @test */
    public function it_tests_a_user_can_create_a_recipe_and_it_persists_improved(): void
    {
        $recipe = Recipe::factory()->for($this->user, 'author')
            ->state([
                'title' => $title = 'My recipe title',
            ])
            ->raw();

        $response = $this->actingAs($this->user)->postJson($this->route, $recipe);

        $response->assertCreated();

        // 💎 Hidden Gem
        // It resolves automatically the standard table or the model protected property table
        // Is easier to use than assert database has and asserts that the model id exists in the database

        $model = Recipe::query()->where('title', $title)->first();

        $this->assertModelExists($model);
    }
}
