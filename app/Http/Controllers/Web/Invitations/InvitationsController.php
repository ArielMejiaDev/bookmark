<?php

namespace App\Http\Controllers\Web\Invitations;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\InvitationsRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class InvitationsController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'invitations');
    }

    public function create(Role $role): InertiaResponse
    {
        $roles = $role->newQuery()->select('id', 'description')->get();
        return Inertia::render('Invitations/Create', compact('roles'));
    }

    public function store(InvitationsRequest $request, User $user): RedirectResponse
    {
        $newUserData = array_merge($request->validated(), ['password' => bcrypt('password')]);
        $user->newQuery()->create($newUserData);

        return redirect()->route('dashboard')->with('success', 'Invitation sent!');
    }
}
