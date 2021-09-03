<?php

namespace App\Providers;

use App\Models\Recipe;
use App\Models\User;
use App\Policies\InviteUsersPolicy;
use App\Policies\RecipePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        User::class => InviteUsersPolicy::class,
        Recipe::class => RecipePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // dashboard gates
        Gate::define('admins.dashboard', fn (User $user) => $user->isAdmin());
        Gate::define('editors.dashboard', fn (User $user) => $user->isAdmin() || $user->isEditor());

        // report gates
        Gate::define('reports.admins.index', fn (User $user) => $user->isAdmin());
        Gate::define('reports.editors.index', fn (User $user) => $user->isAdmin() || $user->isEditor());
    }
}
