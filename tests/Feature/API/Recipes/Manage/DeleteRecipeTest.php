<?php

namespace Tests\Feature\API\Recipes\Manage;

use App\Http\Requests\Web\RecipeRequest;
use App\Models\Admin;
use App\Models\Editor;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteRecipeTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;
    protected User $author;
    protected Editor $editor;
    protected Admin $admin;
    protected Recipe $recipe;
    protected string $route;
    protected array $validationRules;

    protected function setUp(): void
    {
        parent::setUp();

        /** @var User $user */
        $user = User::factory()->create();
        $this->user = $user;

        /** @var User $author */
        $author = User::factory()->create();
        $this->author = $author;

        /** @var Recipe $recipe */
        $recipe = Recipe::factory()->for($author, 'author')->create();
        $this->recipe = $recipe;

        /** @var Editor $editor */
        $editor = Editor::factory()->create();
        $this->editor = $editor;

        /** @var Admin $admin */
        $admin = Admin::factory()->create();
        $this->admin = $admin;

        $this->route = route('api.manage.recipes.destroy', $recipe);
    }

    /** @test */
    public function it_tests_an_unauthenticated_request_cannot_delete_a_recipe_that_does_not_exists_in_database(): void
    {
        $this->deleteJson($this->route)
            ->assertUnauthorized();
    }

    /** @test */
    public function it_tests_a_user_cannot_delete_a_recipe_that_does_not_exists_in_database(): void
    {
        $this->actingAs($this->user)
            ->deleteJson(route('api.manage.recipes.destroy', 2))
            ->assertNotFound();
    }

    /** @test */
    public function it_tests_a_user_cannot_delete_a_recipe_that_does_not_own(): void
    {
        // View RecipePolicy to see the permissions
        $this->actingAs($this->user)
            ->deleteJson($this->route)
            ->assertForbidden();
    }

    /** @test */
    public function it_tests_an_editor_cannot_delete_a_recipe_that_does_not_own(): void
    {
        $this->actingAs($this->editor)
            ->deleteJson($this->route)
            ->assertForbidden();
    }

    /** @test */
    public function it_tests_a_user_author_can_delete_a_recipe(): void
    {
        $this->actingAs($this->author)
            ->deleteJson($this->route)
            ->assertNoContent();

        $this->assertDatabaseCount(Recipe::class, 0);
    }

    /** @test */
    public function it_tests_an_admin_can_delete_any_recipe(): void
    {
        $this->actingAs($this->admin)
            ->deleteJson($this->route)
            ->assertNoContent();

        $this->assertDatabaseCount(Recipe::class, 0);
    }
}
