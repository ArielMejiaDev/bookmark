<?php

namespace App\Http\Controllers\API\Recipes;

use App\Actions\AllRecipesAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\RecipeRequest;
use App\Http\Resources\RecipeResource;
use App\Models\Recipe;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection as RecipesResourceCollection;

class APIManageRecipesController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Recipe::class);
    }

    public function index(AllRecipesAction $action): RecipesResourceCollection
    {
        $recipes = $action->execute();
        return RecipeResource::collection($recipes);
    }

    public function show(Recipe $recipe): RecipeResource
    {
        return RecipeResource::make($recipe->load('author:id,name'));
    }

    public function store(RecipeRequest $request, Recipe $recipe): RecipeResource
    {
        $recipe = $recipe->newQuery()->create($request->validated());
        return RecipeResource::make($recipe->load('author:id,name'));
    }

    public function update(RecipeRequest $request, Recipe $recipe): RecipeResource
    {
        $recipe->update($request->validated());
        return RecipeResource::make($recipe->load('author:id,name'));
    }

    public function destroy(Recipe $recipe): \Illuminate\Http\Response
    {
        $recipe->delete();
        return response()->noContent();
    }
}
