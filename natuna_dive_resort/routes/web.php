<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResortController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

// route dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// route landing page resort
Route::get('/', [ResortController::class, 'index']);

Route::middleware('auth')->group(function () {
    // route Package
    Route::get('/dashboard/package', [PackageController::class, 'index']);
    Route::get('/package/create', [PackageController::class, 'create']);
    Route::post('/package/create', [PackageController::class, 'store']);
    Route::get('/package/show/{package:slug}', [PackageController::class, 'show']);
    Route::get('/package/edit/{package:slug}', [PackageController::class, 'edit']);
    Route::put('/package/update/{package:slug}', [PackageController::class, 'update']);
    Route::delete('/package/delete/{package:slug}', [PackageController::class, 'destroy']);
    // route Room
    Route::get('/dashboard/room', [RoomController::class, 'index']);
    Route::get('/room/create', [RoomController::class, 'create']);
    Route::post('/room/create', [RoomController::class, 'store']);
    Route::get('/room/show/{room:slug}', [RoomController::class, 'show']);
    Route::get('/room/edit/{room:slug}', [RoomController::class, 'edit']);
    Route::put('/room/update/{room:slug}', [RoomController::class, 'update']);
    Route::delete('/room/delete/{room:slug}', [RoomController::class, 'destroy']);
    // route Trip
    Route::get('/dashboard/trip', [TripController::class, 'index']);
    Route::get('/trip/create', [TripController::class, 'create']);
    Route::post('/trip/create', [TripController::class, 'store']);
    Route::get('/trip/show/{trip:slug}', [TripController::class, 'show']);
    Route::get('/trip/{trip:slug}/edit', [TripController::class, 'edit']);
    Route::put('/trip/update/{trip:slug}', [TripController::class, 'update']);
    Route::delete('/trip/delete/{trip:slug}', [TripController::class, 'destroy']);
    // route Message
    Route::get('/dashboard/message', [MessageController::class, 'index']);
    Route::post('/message/create', [MessageController::class, 'store']);
    Route::delete('/message/delete/{message:slug}', [MessageController::class, 'destroy']);
    // route Event
    Route::get('/dashboard/event', [EventController::class, 'index']);
    Route::get('/event/create', [EventController::class, 'create']);
    Route::post('/event/create', [EventController::class, 'store']);
    Route::get('/event/show/{event:slug}', [EventController::class, 'show']);
    Route::get('/event/{event:slug}/edit', [EventController::class, 'edit']);
    Route::put('/event/update/{event:slug}', [eventController::class, 'update']);
    Route::delete('/event/delete/{event:slug}', [EventController::class, 'destroy']);
});


// Route login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
// Route register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
