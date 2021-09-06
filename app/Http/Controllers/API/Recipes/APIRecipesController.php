<?php

namespace App\Http\Controllers\API\Recipes;

use App\Actions\UserRecipesAction;
use App\Http\Controllers\Controller;
use App\Http\Resources\RecipeResource;
use App\Models\Recipe;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection as RecipesResourceCollection;

class APIRecipesController extends Controller
{
    public function __invoke(UserRecipesAction $action): RecipesResourceCollection
    {
        $this->authorize('viewAny', Recipe::class);
        $recipes = $action->execute();
        return RecipeResource::collection($recipes);
    }
}
