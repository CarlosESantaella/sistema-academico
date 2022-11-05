<?php

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

Route::get(
    '/students/certs',
    [StudentsController::class, 'viewCerts']
)->middleware('auth')->name('students.certs');

Route::resource('students', StudentsController::class);

Route::controller(LoginController::class)->group(function(){
    Route::get('/login', 'index')->middleware('guest')->name('login.index');
    Route::post('/login', 'store')->middleware('guest')->name('login.store');
    Route::post('/logout', 'logout')->middleware('auth')->name('logout');
});

Route::put('/students/{student}/changeState', [StudentsController::class, 'changeState'])->name('students.changestate');