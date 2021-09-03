<?php

use App\Http\Controllers\Auth\Editors\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::prefix('editors')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->middleware('guest')
        ->name('editors.login.create');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest')
        ->name('editors.login.store');
});
