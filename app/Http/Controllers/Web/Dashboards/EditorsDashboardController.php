<?php

namespace App\Http\Controllers\Web\Dashboards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class EditorsDashboardController extends Controller
{
    public function __invoke(Request $request): InertiaResponse
    {
        $this->authorize('editors.dashboard');

        $bookmarks = 20;
        $ranking = 5;

        return Inertia::render('Dashboards/Editors/Index', compact('bookmarks', 'ranking'));
    }
}
