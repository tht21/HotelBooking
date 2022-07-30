<?php

use App\Http\Controllers\Admins\AuthController;
use App\Http\Controllers\Admins\BookingController;
use App\Http\Controllers\Admins\CustomersController;
use App\Http\Controllers\Admins\HomeController;
use App\Http\Controllers\Admins\ProfileController;
use App\Http\Controllers\Admins\RoomBookController;
use App\Http\Controllers\Admins\RoomController;
use App\Http\Controllers\Admins\RoomTypeController;
use App\Http\Controllers\Admins\UserController;
use App\Http\Controllers\Admins\UserGroupsController;
use App\Http\Controllers\HomeWebController;
use App\Http\Controllers\Webs\BookingRoomController;
use App\Http\Controllers\Webs\HomeWebController as WebsHomeWebController;
use App\Http\Controllers\Webs\RoomDetailController;
use App\Http\Controllers\Webs\RoomWebController;
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

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


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
        Route::get('/list', [BookingController::class, 'list'])->name('bookingrooms.list');
        Route::get('/trash', [BookingController::class, 'trashedItems'])->name('bookingrooms.trash');
        Route::get('/export', [BookingController::class, 'export'])->name('bookingrooms.export');
        Route::delete('/force_destroy/{id}', [BookingController::class, 'force_destroy'])->name('bookingrooms.force_destroy');
        Route::get('/restore/{id}', [BookingController::class, 'restore'])->name('bookingrooms.restore');
        Route::get('/available-rooms/{checkin_date}', [BookingController::class, 'available_room'])->name('bookingrooms.available_room');

    });
    Route::prefix('customers')->group(function () {
        Route::get('/trash', [CustomersController::class, 'trashedItems'])->name('customers.trash');
        Route::delete('/force_destroy/{id}', [CustomersController::class, 'force_destroy'])->name('customers.force_destroy');
        Route::get('/restore/{id}', [CustomersController::class, 'restore'])->name('customers.restore');
    });

    Route::prefix('usergroups')->group(function () {
        Route::get('/trash', [UserGroupsController::class, 'trashedItems'])->name('usergroups.trash');
        Route::delete('/force_destroy/{id}', [UserGroupsController::class, 'force_destroy'])->name('usergroups.force_destroy');
        Route::get('/restore/{id}', [UserGroupsController::class, 'restore'])->name('usergroups.restore');
    });
    Route::prefix('users')->group(function () {
        Route::get('/trash', [UserController::class, 'trashedItems'])->name('users.trash');
        Route::delete('/force_destroy/{id}', [UserController::class, 'force_destroy'])->name('users.force_destroy');
        Route::get('/restore/{id}', [UserController::class, 'restore'])->name('users.restore');
    });

    Route::resource('profile', ProfileController::class);
    Route::resource('roomtype', RoomTypeController::class);
    Route::resource('rooms', RoomController::class);
    Route::resource('customers', CustomersController::class);
    Route::resource('bookingrooms', BookingController::class);
    Route::resource('usergroups', UserGroupsController::class);
    Route::resource('users', UserController::class);
});


Route::group([
    'prefix' => 'website',
    // 'middleware' => ['auth']
], function () {
    Route::get('home', [WebsHomeWebController::class, 'index'])->name('homeweb');
    Route::get('roomDetail', [RoomDetailController::class, 'index'])->name('roomDetail.index');
    Route::get('room', [RoomWebController::class, 'index'])->name('room.index');
    Route::post('checkout/{id}', [BookingRoomController::class, 'checkout'])->name('booking.checkout'); 
    Route::get('booking/{id}', [BookingRoomController::class, 'index'])->name('booking.index'); 
    Route::get('pay/{id}', [BookingRoomController::class, 'getpay'])->name('booking.pay'); 
    
});
