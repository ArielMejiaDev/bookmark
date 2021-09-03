<?php

namespace App\Http\Controllers\Web\Recipes;

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
    public function __invoke(Request $request, Recipe $recipe): InertiaResponse
    {
        $this->authorize('viewAny', Recipe::class);

        /** @var User $user */
        $user = $request->user();
        $recipes = $user->recipes()
            ->select('id', 'title', 'author_id', 'created_at')
            ->orderByDesc('id')
            ->get();

        $recipes->append('published_at');

        return Inertia::render('Recipes/Index', compact('recipes'));
    }
}
