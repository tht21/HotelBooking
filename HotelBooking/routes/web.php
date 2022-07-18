<?php

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

    
    Route::resource('roomtype', RoomTypeController::class);
});