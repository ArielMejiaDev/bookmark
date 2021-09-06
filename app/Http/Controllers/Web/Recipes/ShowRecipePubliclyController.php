<?php

namespace App\Http\Controllers\Web\Recipes;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class ShowRecipePubliclyController extends Controller
{
    public function __invoke(Recipe $recipe): InertiaResponse
    {
        $recipe = $recipe->load('author:id,name')->append('published_at');
        return Inertia::render('Recipes/Public/Show', compact('recipe'));
    }
}
