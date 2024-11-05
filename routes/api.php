<?php

use App\Http\Controllers\Admin\OfficeController;
use App\Http\Controllers\AiController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'Api', 'prefix' => 'v1'], function () {
    // Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('run-api', [AiController::class, 'index'])->name('ai.run');
});
