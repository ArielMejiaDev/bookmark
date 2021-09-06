<?php

namespace App\Http\Controllers\Web\Landing;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class LandingPageController extends Controller
{
    public function __invoke(Recipe $recipe): InertiaResponse
    {
        $popularRecipes = $recipe->newQuery()
            ->inRandomOrder()
            ->limit(2)
            ->with('author:id,name')
            ->get()
            ->append('published_at');

        $recipes = $recipe->newQuery()
            ->with('author:id,name')
            ->get()
            ->append('published_at');

        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'popularRecipes' => $popularRecipes,
            'recipes' => $recipes,
        ]);
    }
}
