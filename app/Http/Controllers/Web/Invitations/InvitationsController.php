<?php

namespace App\Http\Controllers\Web\Invitations;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\InvitationsRequest;
use App\Mail\Users\UserInvitationMail;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
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

    public function store(InvitationsRequest $request): RedirectResponse
    {
        DB::transaction(function () use ($request) {
            $passwordId = User::query()->latest()->first()->id ?? 1;
            $password = ($passwordId + 1) . Str::random(7);
            $newUserData = array_merge($request->validated(), ['password' => bcrypt($password)]);
            /** @var User $user */
            $user = User::query()->create($newUserData);
            $user->markEmailAsVerified();

            $loginUrl = URL::signedRoute('editors.login.create', ['id' => $user->id]);

            Mail::to($user)->send(
                (new UserInvitationMail($request->user(), $user, $password, $loginUrl))
            );
        });

        return redirect()->route('dashboard')->with('success', 'Invitation sent!');
    }
}
