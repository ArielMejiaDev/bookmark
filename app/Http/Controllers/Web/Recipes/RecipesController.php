<?php

namespace App\Http\Controllers\Web\Recipes;

use App\Actions\UserRecipesAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\RecipeRequest;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class RecipesController extends Controller
{
    public function __invoke(UserRecipesAction $action): InertiaResponse
    {
        $this->authorize('viewAny', Recipe::class);

        $recipes = $action->execute();

        return Inertia::render('Recipes/Index', compact('recipes'));
    }
}
