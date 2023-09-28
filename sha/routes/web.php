<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/sample', function () {
    return view('sample')->withName('swathi');
});
Route::get('/student',function () {
    return view('student');
});
Route::post('/student', 'App\Http\Controllers\StudentController@insert')->name('insert');
Route::get('/student', 'App\Http\Controllers\StudentController@select');
Route::get('delete/{id}', 'App\Http\Controllers\StudentController@delete');
Route::get('student.edit/{id}', 'App\Http\Controllers\StudentController@edit')->name('edit');
Route::post('/edit', 'App\Http\Controllers\StudentController@update')->name('update');
?>