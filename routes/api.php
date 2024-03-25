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
Route::apiResource("/posts",App\Http\Controllers\Api\PostController::class);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('/posts', App\Http\Controllers\Api\PostController::class)->middleware('hak-akses');
Route::post('login', [App\Http\Controllers\Api\AuthController::class, 'signin']);
Route::post('register', [App\Http\Controllers\Api\AuthController::class, 'signup']);
Route::get('/posts', [App\Http\Controllers\Api\PostController::class,'index'])->middleware(['auth:sanctum','hak-akses:admin']);
Route::get('/posts/:id', [App\Http\Controllers\Api\PostController::class, 'show'])->middleware('auth:sanctum');