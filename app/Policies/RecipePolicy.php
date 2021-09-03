<?php

namespace App\Policies;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RecipePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Recipe $recipe): bool
    {
        return $user->isAdmin() || $user->isEditor() || $user->id === (int) $recipe->author_id;
    }

    public function delete(User $user, Recipe $recipe): bool
    {
        return $user->isAdmin() || $user->isEditor() || $user->id === (int) $recipe->author_id;
    }
}
