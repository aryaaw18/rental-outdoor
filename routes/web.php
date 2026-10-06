<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AdminReservationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;


/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::get('/register', [AuthController::class, 'showRegisterForm'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.process');

Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| Halaman Utama User
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/equipment/{id}', [HomeController::class, 'detail'])
    ->name('equipment.detail');


/*
|--------------------------------------------------------------------------
| Reservasi User
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get(
        '/reservation/{equipment}',
        [ReservationController::class, 'create']
    )->name('reservation.create');

    Route::post(
        '/reservation',
        [ReservationController::class, 'store']
    )->name('reservation.store');

    Route::get(
        '/my-reservations',
        [ReservationController::class, 'myReservations']
    )->name('reservations.my');

});


/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get(
            '/dashboard',
            [AdminController::class, 'dashboard']
        )->name('dashboard');

        // CRUD Kategori
        Route::resource(
            'categories',
            CategoryController::class
        );

        // CRUD Peralatan
        Route::resource(
            'equipments',
            EquipmentController::class
        );

        // Kelola Reservasi
        Route::get(
            '/reservations',
            [AdminReservationController::class, 'index']
        )->name('reservations.index');

        Route::post(
            '/reservations/{id}/approve',
            [AdminReservationController::class, 'approve']
        )->name('reservations.approve');

        Route::post(
            '/reservations/{id}/reject',
            [AdminReservationController::class, 'reject']
        )->name('reservations.reject');
    });