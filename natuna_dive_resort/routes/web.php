<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResortController;
use Illuminate\Support\Facades\Route;

// route dashboard
Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/', [ResortController::class, 'index']);
Route::get('/dashboard/package', [PackageController::class, 'index']);
Route::middleware('auth')->group(function () {
    Route::get('/package/create', [PackageController::class, 'create']);
    Route::post('/package/create', [PackageController::class, 'store']);
    Route::get('/show/{package:slug}', [PackageController::class, 'show']);
    Route::delete('/package/delete/{package:slug}', [PackageController::class, 'destroy']);
    Route::get('/package/{package:slug}', [PackageController::class, 'edit']);
    Route::put('/package/edit/{package:slug}', [PackageController::class, 'update']);
});


Route::get('/dashboard/room', [RoomController::class, 'index']);


Route::get('/dashboard/message', function () {
    return view('admin.message.index', [
        'title' => 'Message'
    ]);
});


// halaman single package

// Route login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
// Route register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
