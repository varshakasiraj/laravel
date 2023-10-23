<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::group(['prefix' => 'auth'], function () {
    Route::get('/student_register', function () {
        return view('student_register');
    });
    Route::post('/student_register', 'App\Http\Controllers\AuthController@register')->name('student_register');
    Route::get('/login', 'App\Http\Controllers\AuthController@getlogin')->name('login');
    // Route::post('login', [AuthController::class, 'login']);
    // Route::post('register', [AuthController::class, 'register']);

    // Route::group(['middleware' => 'auth:sanctum'], function() {
    //   Route::get('logout', [AuthController::class, 'logout']);
    //   Route::get('user', [AuthController::class, 'user']);
    // });
});

