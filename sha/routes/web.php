<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::group(['prefix' => 'student'], function () {
    Route::get('/student',function () {
        return view('student');
    });
    Route::post('/student', 'App\Http\Controllers\StudentController@insert')->name('insert');
    Route::get('/student', 'App\Http\Controllers\StudentController@select');
    Route::get('delete/{id}', 'App\Http\Controllers\StudentController@delete');
    Route::get('student_edit/{id}', 'App\Http\Controllers\StudentController@edit')->name('edit');
    Route::post('/edit', 'App\Http\Controllers\StudentController@update')->name('update');
});
Route::group(['prefix' => 'profile'], function () {
    // Route::get('/login', function () {
    //     return view('login');
    // });
    Route::get('/student_register', function () {
        return view('student_register');
    });
    Route::post('/student_register', 'App\Http\Controllers\AuthController@register')->name('student_register');
    Route::post('/login', 'App\Http\Controllers\AuthController@checklogin')->name('login');
    Route::get('/profile', 'App\Http\Controllers\AuthController@getprofile');
    Route::get('logout/{id}', 'App\Http\Controllers\AuthController@logout');
    Route::get('profile_edit/{id}', 'App\Http\Controllers\AuthController@profileEdit');
    Route::post('profile_update', 'App\Http\Controllers\AuthController@profileUpdate')->name('profileUpdate');
});
Route::group(['prefix' => 'cms'], function () {
    Route::get('cms','App\Http\Controllers\Admin\CmspageCrudController@viewProduct')->name('cms');
    Route::get('cms-single/{id}','App\Http\Controllers\Admin\CmspageCrudController@viewSingleProduct');
});
Route::controller(UserController::class)->prefix('industry')->group(function () {
    Route::get('/user_register', function () {
        return view('industry.user_register');
    });
    Route::post('/user_register', 'App\Http\Controllers\UserController@registerLogin')->name('user_register');
    Route::get('/user_login', function () {
        return view('industry.login');
    });
    Route::post('/user_login', 'login')->name('user_login');
    Route::get('/admin_dashboard', ['as'=>'admin_dashboard', function() {
        return view('industry.admin_dash_board');
    }]);
    Route::get('/manager_dashboard', ['as'=>'manager_dashboard', function() {
        return view('industry.admin_dash_board');
    }]);
    Route::get('/supervisor_dashboard', ['as'=>'supervisor_dashboard', function() {
        return view('industry.admin_dash_board');
    }]);
    Route::get('/worker_dashboard', ['as'=>'worker_dashboard', function() {
        return view('industry.admin_dash_board');
    }]);
    Route::get('/error', ['as'=>'error', function() {
        return view('industry.login');
    }]);
    Route::get('editAdmin/{id}','editAdmin')->name('editAdmin');
    Route::get('deleteAdmin/{id}','deleteAdmin');
    Route::get('/workerProfile','workerProfile')->name('workerProfile');
    Route::post('/updateSalary','updateSalary')->name('updateSalary');
    Route::get('/workerlocation ','workerLocation')->name('workerlocation');
    Route::get('editLocationForm/{id}','editLocationForm')->name('editLocationForm');
    Route::post('/ updateLocation','updateLocation')->name('updateLocation');
    Route::get('/workersalary','workerSalary')->name('workersalary');
    Route::get('/Editworkersalary','editWorkerSalary')->name('Editworkersalary');
    Route::get('/EditworkerLocation','editworkerLocation')->name('EditworkerLocation');
    Route::get('editSalary/{id}','editSalaryForm')->name('editSalary');
    Route::get('/managerProfile','managerProfile')->name('managerProfile');
    Route::get('adminProfile/{id}','adminProfile')->name('adminProfile');
    Route::post('/update_details','updateProfile')->name('update_details');
    Route::get('/logout','logout');
});
Route::group(['middleware' => ['role:manager']], function () {
    
});
?>