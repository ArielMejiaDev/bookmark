<?php

namespace App\Http\Controllers\Web\Dashboards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response as InertiaResponse;

class UsersDashboardController extends Controller
{
    public function __invoke(Request $request): InertiaResponse
    {
        $savedBookmarks = 10;

        return Inertia::render('Dashboards/Users/Index', compact('savedBookmarks'));
    }
}
