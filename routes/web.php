<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AdminController;
use App\Http\Livewire\Views\UsersCrudAdmin;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\SecretaryController;
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
    if(auth()->check()){
        if(auth()->user()->tipo == 0){
            return redirect()->route('admins.index');
        }else if(auth()->user()->tipo == 1){
            
        
        }else if(auth()->user()->tipo == 2){
            return redirect()->route('secretary.index');

        
        }else if(auth()->user()->tipo == 3){
            return redirect()->route('students.edit', ['student' => auth()->user()->clave]);
        }
    }else{
        return redirect()->route('login.index');
    }
})->middleware('auth')->name('home');

Route::get('storage-link', function(){
    Artisan::call('storage:link');
});

Route::get('/testform', function () {
    return view('testform');
});

// Auth
Route::controller(LoginController::class)->group(function(){
    Route::get('/login', 'index')->middleware('guest')->name('login.index');
    Route::post('/login', 'store')->middleware('guest')->name('login.store');
    Route::post('/logout', 'logout')->middleware('auth')->name('logout');
    Route::get('/logout', 'logout')->name('logout2');

});

// Admin
Route::controller(AdminController::class)->group(function(){
    Route::get('/dashboard', 'index')->middleware(['auth', 'auth.admin'])->name('admins.index');
    Route::get('/dashboard/license-plates', 'viewLicencePlates')->middleware(['auth', 'auth.admin'])->name('admins.lp');
    Route::get('/dashboard/license-plates/export', 'exportLicensePlates')->middleware(['auth', 'auth.admin'])->name('students.license-plates-export');
    Route::get('/dashboard/pre-registrations/export', 'exportPreRegistrations')->middleware(['auth', 'auth.admin'])->name('students.pre-registrations-export');
    Route::match(['get', 'post'],'/dashboard/license-plates', 'viewLicencePlates')->middleware(['auth', 'auth.admin'])->name('admins.licenses_plates');
    Route::match(['get', 'post'],'/dashboard/search-students', 'searchStudents')->middleware(['auth', 'auth.admin'])->name('admins.search_students');
    Route::get('/dashboard/create-student', 'createStudent')->middleware(['auth', 'auth.admin'])->name('admins.create_student');
    Route::get('/dashboard/preregistrations', 'preregistrations')->middleware(['auth', 'auth.admin'])->name('admins.preregistrations');
    Route::get('/dashboard/registration', 'registration')->middleware(['auth', 'auth.admin'])->name('admins.registration');
    Route::post('/dashboard/add-user', 'storeUser')->middleware(['auth', 'auth.admin'])->name('store.user');
    Route::get('/uploads/certs', 'viewUploadCerts')->middleware(['auth', 'auth.admin'])->name('view.uploads.certs');
    Route::post('/uploads/certs', 'uploadCerts')->middleware(['auth', 'auth.admin'])->name('uploads.certs');
    Route::get('/dashboard/pruebas', 'pruebas')->name('admins.pruebas');
    Route::get('/dashboard/users', 'users')->middleware(['auth', 'auth.admin'])->name('admins.users');
});
Route::get('/dashboard/students/{student}/edit', [StudentsController::class, 'edit'])->middleware('auth')->name('admins.edit.student');
Route::put('/students/{student}/changeState2', [StudentsController::class, 'changeState2'])->name('students.changestate.two');

// Secretary
Route::controller(SecretaryController::class)->group(function(){
    Route::get('/dashboard-s', 'index')->middleware('auth')->name('secretary.index');
    Route::get('/dashboard-s/pre-registrations/export', 'exportPreRegistrations')->middleware('auth')->name('secretary.pre-registrations-export');
    Route::match(['get', 'post'],'/dashboard-s/search-students', 'searchStudents')->middleware('auth')->name('secretary.search_students');
    Route::get('/dashboard-s/preregistrations', 'preregistrations')->middleware('auth')->name('secretary.preregistrations');
});
Route::get('/dashboard-s/students/{student}/edit', [StudentsController::class, 'edit'])->middleware('auth')->name('secretary.edit.student');

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