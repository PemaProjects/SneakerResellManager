<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\SneakerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('/register', [UserController::class, 'store']);
Route::post('/login', [UserController::class, 'login']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::delete('/logout', [UserController::class, 'logout']);
    Route::put('/edit', [UserController::class, 'edit']);
    Route::get('/user', [UserController::class, 'getUserbyToken']);
    Route::get('/sneakers', [SneakerController::class, 'getSneakersByName']);
});