<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\companyController;
use App\Http\Controllers\employeeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('/admins')->middleware(['auth','admin'])->group(function () {

    Route::get('/index', function () {
        return view('admin/index');
    });
     Route::get('/data_table', function () {
        return view('admin/data_table');
    });
    Route::resource('companies',companyController::class);
    Route::get('employee_index',[employeeController::class,'index']);
    Route::post('Employee_save',[employeeController::class,'store']);
    Route::get('Employee/{id}/edit',[employeeController::class,'edit']);
    Route::post('Employee_update/{id}',[employeeController::class,'update']);
    Route::get('Employee/{id}/delete',[employeeController::class,'delete']);
    Route::get('get_user',[employeeController::class,'get_user']);
    Route::any('get_user_data',[employeeController::class,'get_user_data'])->name('users.index');
    Route::get('changeLang',[employeeController::class,'changeLang'])->name('changeLang');






});



Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
