<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LicensePlateController;
use App\Http\Controllers\ResponsibleStudentController;

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
    return redirect('/dashboard');
});
Route::get('/testform', function () {
    return view('testform');
});

// Dashboard
Route::controller(AdminController::class)->group(function(){
    Route::get('/dashboard', 'index')->middleware('auth')->name('admins.index');
    Route::get('/dashboard/license-plates', 'viewLicencePlates')->middleware('auth')->name('admins.lp');
    Route::get('/dashboard/license-plates/export', 'exportLicensePlates')->middleware('auth')->name('students.license-plates-export');
    Route::get('/dashboard/pre-registrations/export', 'exportPreRegistrations')->middleware('auth')->name('students.pre-registrations-export');
    Route::match(['get', 'post'],'/dashboard/license-plates', 'viewLicencePlates')->middleware('auth')->name('admins.licenses_plates');
    Route::match(['get', 'post'],'/dashboard/search-students', 'searchStudents')->middleware('auth')->name('admins.search_students');
    Route::get('/dashboard/create-student', 'createStudent')->middleware('auth')->name('admins.create_student');
    Route::get('/dashboard/preregistrations', 'preregistrations')->middleware('auth')->name('admins.preregistrations');
});
Route::get('/dashboard/students/{student}/edit', [StudentsController::class, 'edit'])->middleware('auth')->name('admins.edit.student');
Route::put('/students/{student}/changeState2', [StudentsController::class, 'changeState2'])->name('students.changestate.two');

// Auth
Route::controller(LoginController::class)->group(function(){
    Route::get('/login', 'index')->middleware('guest')->name('login.index');
    Route::post('/login', 'store')->middleware('guest')->name('login.store');
    Route::post('/logout', 'logout')->middleware('auth')->name('logout');
});

// Students
Route::get(
    '/students/certs',
    [StudentsController::class, 'viewCerts']
)->middleware('auth')->name('students.certs');
Route::resource('students', StudentsController::class);
Route::get('/students/{student}/license-plates', [StudentsController::class, 'getLicensePlatesByStudent'])->name('students.lp');
Route::put('/students/{student}/changeState', [StudentsController::class, 'changeState'])->name('students.changestate');

// Responsible student
Route::get(
    '/responsible_student/{cod_reponsible}/{cod_student}',
    [ResponsibleStudentController::class, 'getByResponsibleAndStudent']
)->middleware('auth')->name('responsible_student.get_by_ra');
Route::delete(
    'responsible_student/{id}', 
    [ResponsibleStudentController::class, 'delete']
)->name('responsible_student.delete');

// License plates
Route::resource('license-plates', LicensePlateController::class);