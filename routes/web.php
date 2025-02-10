<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\ValidUser;


Route::get('/', function () {
    return view('dashboard');
});

Route::view('register', 'register')->name('register');
Route::post('registerSave', [AuthController::class, 'register'])->name('registerSave');

Route::view('login', 'login')->name('login');
Route::post('loginMatch', [AuthController::class, 'login'])->name('loginMatch');

Route::get('dashboard', [AuthController::class, 'dashboardPage'])->name('dashboard')->middleware(ValidUser::class);
Route::get('dashboard/inner', [AuthController::class, 'innerPage'])->name('inner')->middleware(ValidUser::class);

Route::get('logout', [AuthController::class, 'logout'])->name('logout');
