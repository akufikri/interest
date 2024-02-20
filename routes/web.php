<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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

// AUTHENTICABLE
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout']);

// MAIN LAYOUT
Route::get('/', [AppController::class, 'index'])->name('login');

// PAGES
Route::middleware('auth')->group(function () {
    Route::get('/buat', [AppController::class, 'create']);
    Route::get('/postingan/detail/{id}', [AppController::class, 'd_post']);
    Route::get('/postingan/edit/{id}', [AppController::class, 'e_post']);

    Route::get('/album', [AppController::class, 'album']);
    Route::get('/album/detail/{id}', [AppController::class, 'd_album']);
});

Route::get('/search', [AppController::class, 'search'])->name('search');