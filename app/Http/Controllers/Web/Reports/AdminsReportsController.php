<?php

namespace App\Http\Controllers\Web\Reports;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class AdminsReportsController extends Controller
{
    public function __invoke(Admin $admin): InertiaResponse
    {
        $this->authorize('reports.admins.index');

        $admins = $admin->newQuery()
            ->select('id', 'name', 'email', 'role_id')
            ->with('role:id,description')
            ->get();
        return Inertia::render('Reports/Admins/Index', compact('admins'));
    }
}
