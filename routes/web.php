<?php

use App\Http\Controllers\GuestbookController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ReportsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
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
    return view('auth/login');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\GuestbookController::class, 'index'])->name('home');
Route::resource('guestbooks',GuestbookController::class);
Route::resource('users',UserController::class);
// ADMIN
 Route::get('admin/home', [App\Http\Controllers\admin\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
