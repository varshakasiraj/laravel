<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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

Route::middleware([AuthController::class])->group(function () {
    Route::get('/login', function () {
        return view('login');
    });
    Route::get('/student',function () {
        return view('student');
    });
});

Route::controller(UserController::class)->group(function () {
    Route::post('/user_login', 'getDetails');
});