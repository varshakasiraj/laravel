<?php
use App\Http\Controllers\AuthController;
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
Route::get('/login', function () {
    return view('login');
});
Route::get('/student',function () {
    return view('student');
});
Route::get('/student_register', function () {
    return view('student_register');
});
Route::post('/student', 'App\Http\Controllers\StudentController@insert')->name('insert');
Route::get('/student', 'App\Http\Controllers\StudentController@select');
Route::get('delete/{id}', 'App\Http\Controllers\StudentController@delete');
Route::get('student_edit/{id}', 'App\Http\Controllers\StudentController@edit')->name('edit');
Route::post('/edit', 'App\Http\Controllers\StudentController@update')->name('update');
Route::get('cms','App\Http\Controllers\Admin\CmspageCrudController@viewProduct');
Route::get('cms-single/{id}','App\Http\Controllers\Admin\CmspageCrudController@viewSingleProduct');
Route::post('/student_register', 'App\Http\Controllers\AuthController@register')->name('student_register');
Route::post('/login', 'App\Http\Controllers\AuthController@getlogin')->name('login');
?>