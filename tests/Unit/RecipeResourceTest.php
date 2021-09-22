<?php

namespace Tests\Unit;

use App\Http\Resources\RecipeResource;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RecipeResourceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_tests_a_recipe_resource_without_any_relationship(): void
    {
        /** @var Recipe $recipe */
        $recipe = Recipe::factory()->create();

        $resource = RecipeResource::make($recipe);

        // 💎 Hidden Gem
        // Custom helper on Laravel TestCase useful on any other test file.
        $this->assertEquals($this->resourceToArray($resource), [
            'id' => $recipe->id,
            'title' => $recipe->title,
            'content' => $recipe->content,
        ]);
    }

    /** @test */
    public function it_tests_a_recipe_resource_with_author_relationship(): void
    {
        $user = User::factory()->create();

        /** @var Recipe $recipe */
        $recipe = Recipe::factory()->for($user, 'author')->create();

        $resource = RecipeResource::make($recipe->load('author'));

        $this->assertEquals($this->resourceToArray($resource), [
            'id' => $recipe->id,
            'title' => $recipe->title,
            'content' => $recipe->content,
            'author' => [
                'id' => $recipe->author->id,
                'name' => $recipe->author->name,
            ]
        ]);
    }
}
