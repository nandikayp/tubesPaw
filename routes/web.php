<?php

use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', [App\Http\Controllers\AuthController::class, 'singin'])->name('login')->middleware('guest');
Route::get('/register', [App\Http\Controllers\AuthController::class, 'singup'])->name('signup')->middleware('guest');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'auth'])->name('auth');
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register');

Route::middleware('auth')->group(function () {
    // Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
    Route::get('/my-bookings', [ReservationController::class, 'myBookings'])->name('my-bookings');
    Route::post('/my-bookings/{reservation}/cancel', [ReservationController::class, 'cancel'])->name('my-bookings.cancel');

    // Admin Routes
    Route::prefix('admin')->group(function () {
        Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
        Route::resource('users', App\Http\Controllers\UserController::class);
        Route::resource('facilities', App\Http\Controllers\FacilityController::class);
        Route::resource('categories', App\Http\Controllers\CategoryController::class);
        Route::resource('reservations', App\Http\Controllers\ReservationController::class);
        Route::resource('schedules', App\Http\Controllers\RoomScheduleController::class);
        Route::resource('documents', App\Http\Controllers\DocumentsController::class);
        Route::resource('rooms', App\Http\Controllers\RoomController::class);
    });
});
Route::get('/ruangan/kelas', [RoomController::class, 'kelas'])->name('rooms.kelas');
Route::get('/ruangan/laboratorium', [RoomController::class, 'laboratorium'])->name('rooms.lab');
// Room Detail & Schedule
Route::get('/ruangan/{id}/detail', [RoomController::class, 'detail'])->name('rooms.detail');


Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');
