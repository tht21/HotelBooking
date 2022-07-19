<?php

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

// Route::get('/', function () {
//     return view('layouts.admin.app');
// });

Route::group([
    'prefix' => 'admin',
    // 'middleware' => ['auth:admin_login']
], function () {

    Route::get('/home', function () {
        return view('layouts.admin.app');
    })->name('home');


    Route::prefix('roomtype')->group(function () {
        Route::get('/trash', [RoomTypeController::class, 'trashedItems'])->name('roomtype.trash');
        Route::delete('/force_destroy/{id}', [RoomTypeController::class, 'force_destroy'])->name('roomtype.force_destroy');
        Route::get('/restore/{id}', [RoomTypeController::class, 'restore'])->name('roomtype.restore');
    });


    Route::resource('roomtype', RoomTypeController::class);
    Route::resource('rooms', RoomController::class);


});

