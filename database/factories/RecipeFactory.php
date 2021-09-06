<?php

namespace Database\Factories;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeFactory extends Factory
{
    protected $model = Recipe::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->text(30),
            'slug' => $this->faker->slug,
            'content' => $this->faker->realText,
            'thumbnail' => 'https://source.unsplash.com/random?desserts',
            'author_id' => User::factory(),
        ];
    }
}
