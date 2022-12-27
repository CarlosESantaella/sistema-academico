<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
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
    Route::get('/dashboard/license-plates', 'viewLicencePlates')->middleware(['auth', 'auth.users:0'])->name('admins.lp');
    Route::get('/dashboard/license-plates/export', 'exportLicensePlates')->middleware(['auth', 'auth.users:0,2'])->name('students.license-plates-export');
    Route::get('/dashboard/pre-registrations/export', 'exportPreRegistrations')->middleware(['auth', 'auth.users:0,2'])->name('students.pre-registrations-export');
    Route::get('/dashboard/subjects-professor/export', 'exportSubjectsProfessor')->middleware(['auth', 'auth.users:0'])->name('admins.subjects-export');
    Route::match(['get', 'post'],'/dashboard/license-plates', 'viewLicencePlates')->middleware(['auth', 'auth.users:0,2'])->name('admins.licenses_plates');
    Route::match(['get', 'post'],'/dashboard/search-students', 'searchStudents')->middleware(['auth', 'auth.admin'])->name('admins.search_students');
    Route::get('/dashboard/create-student', 'createStudent')->middleware(['auth', 'auth.admin'])->name('admins.create_student');
    Route::get('/dashboard/preregistrations', 'preregistrations')->middleware(['auth', 'auth.admin'])->name('admins.preregistrations');
    Route::get('/dashboard/registration/{student?}', 'registration')->middleware(['auth', 'auth.admin'])->name('admins.registration');
    Route::post('/dashboard/add-user', 'storeUser')->middleware(['auth', 'auth.admin'])->name('store.user');
    Route::get('/uploads/certs', 'viewUploadCerts')->middleware(['auth', 'auth.admin'])->name('view.uploads.certs');
    Route::post('/uploads/certs', 'uploadCerts')->middleware(['auth', 'auth.admin'])->name('uploads.certs');
    // Route::get('/dashboard/pruebas', 'pruebas')->middleware(['auth', 'auth.admin'])->name('admins.pruebas');
    Route::get('/dashboard/users', 'users')->middleware(['auth', 'auth.admin'])->name('admins.users');
    Route::get('/dashboard/subjects', 'subjects')->middleware(['auth', 'auth.admin'])->name('admins.subjects');
});
Route::get('/dashboard/students/{student}/edit', [StudentsController::class, 'edit'])->middleware(['auth', 'auth.admin'])->name('admins.edit.student');
Route::put('/students/{student}/changeState2', [StudentsController::class, 'changeState2'])->middleware(['auth', 'auth.users:0,2'])->name('students.changestate.two');

// Secretary
Route::controller(SecretaryController::class)->group(function(){
    Route::get('/dashboard-s', 'index')->middleware(['auth', 'auth.users:2'])->name('secretary.index');
    Route::get('/dashboard-s/pre-registrations/export', 'exportPreRegistrations')->middleware(['auth', 'auth.users:2'])->name('secretary.pre-registrations-export');
    Route::match(['get', 'post'],'/dashboard-s/search-students', 'searchStudents')->middleware(['auth', 'auth.users:2'])->name('secretary.search_students');
    Route::get('/dashboard-s/create-student', 'createStudent')->middleware(['auth', 'auth.users:2'])->name('secretary.create_student');
    Route::get('/dashboard-s/registration/{student?}', 'registration')->middleware(['auth', 'auth.users:2'])->name('secretary.registration');
    Route::match(['get', 'post'],'/dashboard-s/license-plates', 'viewLicencePlates')->middleware(['auth', 'auth.users:2'])->name('secretary.licenses_plates');
    Route::get('/dashboard-s/preregistrations', 'preregistrations')->middleware(['auth', 'auth.users:2'])->name('secretary.preregistrations');



    Route::get('/dashboard-s/lists-by-course', 'listsByCourse')->middleware(['auth', 'auth.users:2'])->name('secretary.lists-by-course');
    Route::post('/dashboard-s/lists-by-course', 'listsByCourseExport')->middleware(['auth', 'auth.users:2'])->name('secretary.lists-by-course-export');
    Route::get('/dashboard-s/list-students', 'listStudents')->middleware(['auth', 'auth.users:2'])->name('secretary.list-students');
    Route::post('/dashboard-s/list-students', 'listStudentsExport')->middleware(['auth', 'auth.users:2'])->name('secretary.list-students-export');
    Route::get('/dashboard-s/students-school', 'studentsSchool')->middleware(['auth', 'auth.users:2'])->name('secretary.students-school');
    Route::get('/dashboard-s/tickets-generate', 'ticketsGenerate')->middleware(['auth', 'auth.users:2'])->name('secretary.tickets-generate');
    Route::get('/dashboard-s/advisors', 'advisors')->middleware(['auth', 'auth.users:2'])->name('secretary.advisors');
    Route::get('/dashboard-s/indexes', 'indexes')->middleware(['auth', 'auth.users:2'])->name('secretary.indexes');




});
Route::get('/dashboard-s/students/{student}/edit', [StudentsController::class, 'edit'])->middleware(['auth', 'auth.users:2'])->name('secretary.edit.student');

//teachers
Route::controller(TeacherController::class)->group(function(){
    Route::get('/dashboard-t', 'index')->middleware(['auth', 'auth.users:1'])->name('teacher.index');
    Route::match(['get', 'post'],'/dashboard-t/search-students', 'searchStudents')->middleware(['auth', 'auth.users:1'])->name('teacher.search_students');
    Route::get('/dashboard-t/create-student', 'createStudent')->middleware(['auth', 'auth.users:1'])->name('teacher.create_student');
    Route::get('/dashboard-t/registration/{student?}', 'registration')->middleware(['auth', 'auth.users:1'])->name('teacher.registration');
});
Route::get('/dashboard-t/students/{student}/edit', [StudentsController::class, 'edit'])->middleware(['auth', 'auth.users:1'])->name('secretary.edit.student');

// Students
Route::get(
    '/students/certs',
    [StudentsController::class, 'viewCerts']
)->middleware(['auth'])->name('students.certs');
Route::resource('students', StudentsController::class)->middleware(['auth', 'auth.users:3,0,2']);
Route::get('/students/{student}/license-plates', [StudentsController::class, 'getLicensePlatesByStudent'])->middleware(['auth', 'auth.users:0,2'])->name('students.lp');
Route::put('/students/{student}/changeState', [StudentsController::class, 'changeState'])->middleware(['auth', 'auth.users:0,2,3'])->name('students.changestate');

// Responsible student
Route::get(
    '/responsible_student/{cod_reponsible}/{cod_student}',
    [ResponsibleStudentController::class, 'getByResponsibleAndStudent']
)->middleware(['auth', 'auth.users:0,2'])->name('responsible_student.get_by_ra');
Route::delete(
    'responsible_student/{id}', 
    [ResponsibleStudentController::class, 'delete']
)->middleware(['auth', 'auth.users:0,2'])->name('responsible_student.delete');

// License plates
Route::resource('license-plates', LicensePlateController::class)->middleware(['auth', 'auth.users:0,2']);