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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('users', [Api\UsersController::class, 'index']);
Route::post('users', [Api\UsersController::class, 'store']);
Route::get('users/{user}', [Api\UsersController::class, 'show']);
Route::put('users/{user}', [Api\UsersController::class, 'update']);
Route::delete('users/{user}', [Api\UsersController::class, 'destroy']);