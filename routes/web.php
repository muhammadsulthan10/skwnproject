<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Halaman Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');

// Rute yang membutuhkan login (berlaku untuk halaman-halaman lainnya)
Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/bookings-chart-data', [DashboardController::class, 'getBookingsChartData']);
    Route::get('/get-booking-data', [DashboardController::class, 'getBookingData']);

    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::post('/bookings/store', [BookingController::class, 'store'])->name('bookings.store');

    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');

    Route::get('/vehicle', [VehicleController::class, 'index'])->name('vehicle.index');
    Route::post('/vehicle/store', [VehicleController::class, 'store'])->name('vehicle.store');

    Route::get('/driver', [DriverController::class, 'index'])->name('driver.index');
    Route::post('/driver/store', [DriverController::class, 'store'])->name('driver.store');

    Route::get('/log', [LogController::class, 'index'])->name('log.index');

    // Logout Route
    Route::get('/logout', function () {
        // Menghapus semua sesi
        session()->flush();

        // Logout pengguna
        Auth::logout();

        // Redirect ke halaman login
        return redirect('/login');
    });
});
