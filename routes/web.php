<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaintController;
use App\Http\Controllers\DoorController;
use App\Http\Controllers\RoomController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [RoomController::class, 'showRoomForm'])->name('room.form');
Route::post('/add-room', [RoomController::class, 'storeRoom'])->name('room.store');
Route::get('/windows', [RoomController::class, 'showWindowForm'])->name('window.form');
Route::post('/add-window', [RoomController::class, 'storeWindow'])->name('window.store');
Route::get('/result', [RoomController::class, 'showResult'])->name('result');
