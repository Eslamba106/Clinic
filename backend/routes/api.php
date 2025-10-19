<?php

use Illuminate\Support\Facades\Route;
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
Route::group(['prefix' => 'admin/user', 'middleware' => 'auth:sanctum'], function () {
    Route::post('add-user',  [UserController::class, 'store'])->name('store.user');
    Route::get('user-profile',  [UserController::class, 'userProfile'])->name('user.profile');
    Route::post('change-password',  [UserController::class, 'changePassword'])->name('change.password');
});