<?php

namespace Tests\Feature\API\Recipes\Manage;

use App\Http\Requests\Web\RecipeRequest;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class UpdateRecipeTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected User $user;
    protected Recipe $recipe;
    protected string $route;
    protected array $validationRules;

    protected function setUp(): void
    {
        parent::setUp();

        /** @var User $user */
        $user = User::factory()->create();
        $this->user = $user;

        /** @var Recipe $recipe */
        $recipe = Recipe::factory()->for($user, 'author')->create();
        $this->recipe = $recipe;

        $this->route = route('api.manage.recipes.update', $this->recipe);

        $this->validationRules = array_keys((new RecipeRequest())->rules());
    }

    /** @test */
    public function it_tests_a_non_author_user_with_guest_role_cannot_update_a_recipe(): void
    {
        /** @var User $nonAuthorUser */
        $nonAuthorUser = User::factory()->create();

        $newRecipeData = Recipe::factory()->raw();

        $response = $this->actingAs($nonAuthorUser)
            ->putJson($this->route, $newRecipeData);

        // 💎 Hidden Gem
        // Use this helper instead of hard coding response status 401
        $response->assertForbidden();
    }

    /** @test */
    public function it_tests_a_user_get_not_found_exception_if_recipe_does_not_exists(): void
    {
        $newRecipeData = Recipe::factory()->raw();

        $response = $this->actingAs($this->user)
            ->putJson(route('api.manage.recipes.update', 2), $newRecipeData);

        // 💎 Hidden Gem
        // Use this helper instead of hard coding response status 404
        $response->assertNotFound();
    }

    /**
     * @test
     * @dataProvider invalidRecipesRequestData
     */
    public function it_tests_a_user_cannot_update_a_recipe_with_invalid_data($invalidData, $invalidFields): void
    {
        // 💎 Hidden Gem
        // To test your form request rules against a lot of scenarios use PHPUnit data providers.
        // Instead of multiple tests for the same endpoint.
        // $invalidData represents an array item value and $invalidFields represents an array item keys on every iteration.
        $response = $this->actingAs($this->user)
            ->putJson($this->route, $invalidData);

        $response->assertJsonValidationErrors($invalidFields);

        $response->assertUnprocessable();
    }

    public function invalidRecipesRequestData(): array
    {
        $nonImageFile = UploadedFile::fake()->create('report.pdf');

        return [
            [
                ['title' => 1, 'content' => 2], // $invalidData
                ['title', 'content'], // $invalidFields
            ],
            [
                ['title' => null, 'content' => null, 'thumbnail' => 10, 'slug' => null],
                ['title', 'content', 'thumbnail', 'slug'],
            ],
            [
                ['title' => 1, 'content' => 2, 'thumbnail' => $nonImageFile],
                ['title', 'content', 'thumbnail'],
            ],
        ];
    }
}
