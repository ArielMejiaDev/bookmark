<?php

namespace App\Http\Controllers\Web\Recipes;

use App\Actions\AllRecipesAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\RecipeRequest;
use App\Models\Recipe;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class ManageRecipesController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Recipe::class);
    }

    public function index(AllRecipesAction $action): InertiaResponse
    {
        $recipes = $action->execute();
        return Inertia::render('Recipes/Manage/Index', compact('recipes'));
    }

    public function create(): InertiaResponse
    {
        return Inertia::render('Recipes/Manage/Create');
    }

    public function store(RecipeRequest $request, Recipe $recipe): RedirectResponse
    {
        $recipe->newQuery()->create($request->validated());
        return redirect()->route('manage.recipes.index')->with('success', 'Recipe created.');
    }

    public function edit(Recipe $recipe): InertiaResponse
    {
        return Inertia::render('Recipes/Manage/Edit', [
            'recipe' => $recipe->only('id', 'title', 'content')
        ]);
    }

    public function update(RecipeRequest $request, Recipe $recipe): RedirectResponse
    {
        $recipe->update($request->validated());
        return redirect()->route('manage.recipes.index')->with('success', 'Recipe updated.');
    }

    public function destroy(Recipe $recipe): RedirectResponse
    {
        $recipe->delete();
        return redirect()->back()->with('success', 'Recipe deleted.');
    }
}
