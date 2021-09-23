<?php

namespace App\Actions;

use App\Models\Recipe;

class AllRecipesAction
{
    protected Recipe $recipe;

    public function __construct(Recipe $recipe)
    {
        $this->recipe = $recipe;
    }

    public function execute()
    {
        return $this->recipe->newQuery()
            ->select('id', 'title', 'author_id')
            ->orderByDesc('id')
            ->with('author:id,name')
            ->paginate();
    }
}
