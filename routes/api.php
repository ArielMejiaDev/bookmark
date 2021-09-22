<?php

use App\Http\Controllers\API\Auth\Admins\APIAdminsLoginController;
use App\Http\Controllers\API\Auth\Editors\APIEditorsLoginController;
use App\Http\Controllers\API\Recipes\APIRecipesController;
use App\Http\Controllers\API\Recipes\APIManageRecipesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

require __DIR__ . '/json-api-auth.php';

Route::post('admins/login', APIAdminsLoginController::class)->name('api.admins.login.store');
Route::post('editors/login', APIEditorsLoginController::class)->name('api.editors.login.store');

Route::middleware('auth:sanctum')->group(function () {

    Route::apiResource('manage/recipes', APIManageRecipesController::class, ['as' => 'api.manage']);

    Route::get('recipes', APIRecipesController::class)->name('api.recipes.index');
});
