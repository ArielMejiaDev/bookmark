<?php

use App\Http\Controllers\Auth\Admins\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::prefix('admins')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->middleware('guest')
        ->name('admins.login.create');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest')
        ->name('admins.login.store');
});
