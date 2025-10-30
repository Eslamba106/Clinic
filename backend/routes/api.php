<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\general\AuthController;
use App\Http\Controllers\general\RoleController;
use App\Http\Controllers\general\UserController;

Route::post('login',  [AuthController::class, 'login'])->name('login');
Route::post('register',  [AuthController::class, 'register'])->name('register');

Route::group(['prefix' => 'admin/roles', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [RoleController::class, 'index'])->name('roles');
    Route::get('/show-role/{id}', [RoleController::class, 'role'])->name('show_role_info');
    Route::get('/sections', [RoleController::class, 'section'])->name('sections');
    Route::post('/store', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::post('/update/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/delete/{id}', [RoleController::class, 'destroy'])->name('roles.delete');
});
Route::group(['prefix' => 'users', 'middleware' => 'auth:sanctum'], function () {
    Route::post('add-user',  [UserController::class, 'store'])->name('store.user');
    Route::get('all-users',  [UserController::class, 'user_list'])->name('user.user_list');
    Route::get('get-user/{id}',  [UserController::class, 'get_user'])->name('user.get_user');
    Route::post('change-password',  [UserController::class, 'changePassword'])->name('change.password');
});

// clinics 

Route::group(['prefix' => 'clinics', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [ClinicController::class, 'index'])->name('clinics');
    Route::get('/show-clinic/{id}', [ClinicController::class, 'show'])->name('show_clinic_info');
    Route::get('/sections', [ClinicController::class, 'section'])->name('sections');
    Route::post('/store', [ClinicController::class, 'store'])->name('clinics.store'); 
    Route::post('/update/{id}', [ClinicController::class, 'update'])->name('clinics.update');
    Route::delete('/delete/{id}', [ClinicController::class, 'destroy'])->name('clinics.delete');
});

// doctors 

Route::group(['prefix' => 'doctors', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [DoctorController::class, 'index'])->name('doctors');
    Route::get('/show-doctor/{id}', [DoctorController::class, 'show'])->name('show_doctor_info'); 
    Route::post('/store', [DoctorController::class, 'store'])->name('doctors.store'); 
    Route::post('/update/{id}', [DoctorController::class, 'update'])->name('doctors.update');
    Route::delete('/delete/{id}', [DoctorController::class, 'destroy'])->name('doctors.delete');
});