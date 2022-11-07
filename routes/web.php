<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\Auth\LoginController;

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

Route::controller(AdminController::class)->group(function(){
    Route::get('/dashboard', 'index')->middleware('auth')->name('admins.index');
    Route::get('/dashboard/license-plates', 'viewLicencePlates')->middleware('auth')->name('admins.lp');

});

Route::get(
    '/students/certs',
    [StudentsController::class, 'viewCerts']
)->middleware('auth')->name('students.certs');

Route::get(
    '/dashboard/license-plates/export',
    [AdminController::class, 'exportLicensePlates']
)->middleware('auth')->name('students.license-plates-export');

Route::match(
    ['get', 'post'],
    '/dashboard/license-plates',
    [AdminController::class, 'viewLicencePlates']
)->middleware('auth')->name('admins.licenses_plates');

Route::resource('students', StudentsController::class);

Route::controller(LoginController::class)->group(function(){
    Route::get('/login', 'index')->middleware('guest')->name('login.index');
    Route::post('/login', 'store')->middleware('guest')->name('login.store');
    Route::post('/logout', 'logout')->middleware('auth')->name('logout');
});

Route::put('/students/{student}/changeState', [StudentsController::class, 'changeState'])->name('students.changestate');

Route::delete('students/delete/ra/{id}', [StudentsController::class, 'deleteRA'])->name('students.delete.ra');