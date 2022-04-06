<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/register', [\App\Http\Controllers\LiveRegisterController::class, 'index'])->name('register');
Route::get('/', [\App\Http\Controllers\LiveLoginController::class, 'index'])->name('login');

Route::get('/parent/logout', [\App\Http\Controllers\HomeController::class, 'parentLogout'])->name('parentLogout');
Route::get('/canteen/staff/logout', [\App\Http\Controllers\HomeController::class, 'canteenStaffLogout'])->name('canteenStaffLogout');
Route::get('/admin/logout', [\App\Http\Controllers\HomeController::class, 'adminLogout'])->name('adminLogout');
// Auth::routes();

// Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['parent'])->group(function(){
    Route::get('/parent/dashboard', [\App\Http\Controllers\HomeController::class, 'home'])->name('parentDashboard');
    Route::get('/parent/dashboard/child/create', [\App\Http\Controllers\ParentController::class, 'createChild'])->name('createChild');
    Route::get('/parent/dashboard/evoucher', [\App\Http\Controllers\ParentController::class, 'showVoucherForm'])->name('showVoucherFormcreateChild');
});

Route::middleware(['staff'])->group(function(){
    Route::get('/canteen/dashboard', [\App\Http\Controllers\HomeController::class, 'staff'])->name('staffDashboard');
    Route::get('/canteen/changepassword', [\App\Http\Controllers\StaffController::class, 'staffChangePassword'])->name('staffChangePassword');
});

Route::middleware(['user'])->group(function(){
    Route::get('/admin/dashboard', [\App\Http\Controllers\HomeController::class, 'admin'])->name('adminDashboard');
    Route::get('admin/dashboard/student/create',[\App\Http\Controllers\StudentController::class, 'index'])->name('createStudent');
    Route::get('/admin/dashboard/staff/create',[\App\Http\Controllers\StaffController::class, 'index'])->name('createStaff');
    Route::get('/verify/parent',[\App\Http\Controllers\StudentController::class, 'verifyParent'])->name('verifyParent');
});

// Auth::routes();


