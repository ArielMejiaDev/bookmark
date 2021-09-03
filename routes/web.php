<?php

use App\Http\Controllers\Web\Dashboards\AdminsDashboardController;
use App\Http\Controllers\Web\Dashboards\EditorsDashboardController;
use App\Http\Controllers\Web\Dashboards\UsersDashboardController;
use App\Http\Controllers\Web\Invitations\InvitationsController;
use App\Http\Controllers\Web\Recipes\ManageRecipesController;
use App\Http\Controllers\Web\Recipes\RecipesController;
use App\Http\Controllers\Web\Reports\AdminsReportsController;
use App\Http\Controllers\Web\Reports\EditorsReportsController;
use App\Http\Controllers\Web\Reports\UsersReportsController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

require __DIR__.'/auth.php';

require __DIR__ . '/admins-auth.php';

require __DIR__ . '/editors-auth.php';

Route::middleware('auth', 'verified')->group(function () {
    Route::get('admins/dashboard', AdminsDashboardController::class)->name('admins.dashboard');
    Route::get('editors/dashboard', EditorsDashboardController::class)->name('editors.dashboard');
    Route::get('dashboard', UsersDashboardController::class)->name('dashboard');

    Route::resource('invitations', InvitationsController::class)->only(['create', 'store']);

    Route::resource('manage/recipes', ManageRecipesController::class, ['as' => 'manage'])
        ->except('show');

    Route::get('recipes', RecipesController::class)->name('recipes.index');

    Route::get('reports/admins', AdminsReportsController::class)->name('reports.admins.index');
    Route::get('reports/editors', EditorsReportsController::class)->name('reports.editors.index');
    Route::get('reports/users', UsersReportsController::class)->name('reports.users.index');
});
