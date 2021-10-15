<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('auth')->group(function() {
    Route::post('register', [\App\Http\Controllers\AuthController::class, 'register']);
});

Route::prefix('users')->group(function() {
    Route::get('', [\App\Http\Controllers\UserController::class, 'index']);
    Route::get('{id}', [\App\Http\Controllers\UserController::class, 'show']);
    Route::delete('{userId}/roles/{roleId}', [\App\Http\Controllers\UserController::class, 'removeRole']);
    Route::post('{userId}/roles/{roleId}', [\App\Http\Controllers\UserController::class, 'addRole']);
});

Route::prefix('roles')->group(function() {
    Route::get('', [\App\Http\Controllers\RoleController::class, 'index']);
    Route::get('{id}', [\App\Http\Controllers\RoleController::class, 'show']);
    Route::delete('{id}', [\App\Http\Controllers\RoleController::class, 'delete']);
});

Route::prefix('servers')->group(function() {
    Route::get('auth', [\App\Http\Controllers\ServerController::class, 'auth']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
