<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;
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

// Route::get('login', function () {return view('admin.auth.login');})->name('login');
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'postlogin'])->name('postlogin');

Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth']
], function () {

    Route::get('/home', function () {
        return view('layouts.admin.app');
    })->name('home');


    Route::prefix('roomtype')->group(function () {
        Route::get('/trash', [RoomTypeController::class, 'trashedItems'])->name('roomtype.trash');
        Route::delete('/force_destroy/{id}', [RoomTypeController::class, 'force_destroy'])->name('roomtype.force_destroy');
        Route::get('/restore/{id}', [RoomTypeController::class, 'restore'])->name('roomtype.restore');
    });

    Route::prefix('rooms')->group(function () {
        Route::get('/trash', [RoomController::class, 'trashedItems'])->name('rooms.trash');
        Route::delete('/force_destroy/{id}', [RoomController::class, 'force_destroy'])->name('rooms.force_destroy');
        Route::get('/restore/{id}', [RoomController::class, 'restore'])->name('rooms.restore');
    });

    Route::prefix('bookingrooms')->group(function () {
        Route::get('/trash', [BookingController::class, 'trashedItems'])->name('bookingrooms.trash');
        Route::delete('/force_destroy/{id}', [BookingController::class, 'force_destroy'])->name('bookingrooms.force_destroy');
        Route::get('/restore/{id}', [BookingController::class, 'restore'])->name('bookingrooms.restore');
    });
    Route::prefix('customers')->group(function () {
        Route::get('/trash', [CustomersController::class, 'trashedItems'])->name('customers.trash');
        Route::delete('/force_destroy/{id}', [CustomersController::class, 'force_destroy'])->name('customers.force_destroy');
        Route::get('/restore/{id}', [CustomersController::class, 'restore'])->name('customers.restore');

    });

    Route::resource('roomtype', RoomTypeController::class);
    Route::resource('rooms', RoomController::class);
    Route::resource('customers', CustomersController::class);
    Route::resource('bookingrooms', BookingController::class);
});


