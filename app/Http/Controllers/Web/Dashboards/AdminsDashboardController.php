<?php

namespace App\Http\Controllers\Web\Dashboards;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Editor;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class AdminsDashboardController extends Controller
{
    protected int $admins;
    protected int $editors;
    protected int $users;

    public function __construct(Admin $admins, Editor $editors, User $users)
    {
        $this->admins = $admins->newQuery()->count();
        $this->editors = $editors->newQuery()->count();
        $this->users = $users->newQuery()->count();
    }

    public function __invoke(Request $request): InertiaResponse
    {
        $this->authorize('admins.dashboard');

        return Inertia::render('Dashboards/Admins/Index', [
            'admins' => $this->admins,
            'editors' => $this->editors,
            'users' => $this->users,
        ]);
    }
}
