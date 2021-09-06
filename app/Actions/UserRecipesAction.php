<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class UserRecipesAction
{
    protected Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function execute(): Collection
    {
        /** @var User $user */
        $user = $this->request->user();

        $recipes = $user->recipes()
            ->select('id', 'title', 'author_id', 'created_at')
            ->orderByDesc('id')
            ->get();

        return $recipes->append('published_at');
    }
}
