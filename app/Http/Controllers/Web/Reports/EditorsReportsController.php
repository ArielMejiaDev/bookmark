<?php

namespace App\Http\Controllers\Web\Reports;

use App\Http\Controllers\Controller;
use App\Models\Editor;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class EditorsReportsController extends Controller
{
    public function __invoke(Editor $editors): InertiaResponse
    {
        $this->authorize('reports.editors.index');

        $editors = $editors->newQuery()
            ->select('id', 'name', 'email', 'role_id')
            ->with('role:id,description')
            ->get();

        return Inertia::render('Reports/Editors/Index', compact('editors'));
    }
}
