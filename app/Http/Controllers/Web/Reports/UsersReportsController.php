<?php

namespace App\Http\Controllers\Web\Reports;

use App\Http\Controllers\Controller;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class UsersReportsController extends Controller
{
    public function __invoke(User $user): InertiaResponse
    {
        $users = $user->newQuery()
            ->normalRole()
            ->select('id', 'name', 'email', 'role_id')
            ->with('role:id,description')
            ->get();

        return Inertia::render('Reports/Users/Index', compact('users'));
    }
}
