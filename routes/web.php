<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\KomentarFotoController;
use App\Http\Controllers\LikeFotoController;

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

// Apply 'auth' middleware on the home route
Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// Authentication routes with 'guest' middleware
Route::name('auth.')->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('login', [AuthController::class, 'loginForm'])->name('loginForm');
        Route::post('login', [AuthController::class, 'login'])->name('login');
        Route::get('signup', [AuthController::class, 'signupForm'])->name('signupForm');
        Route::post('signup', [AuthController::class, 'signup'])->name('signup');
    });

    // Logout for authenticated users only
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

// Apply 'auth' middleware on all routes related to albums
Route::middleware(['auth'])->group(function () {
    Route::prefix('album')->name('albums.')->group(function () {
        Route::get('/', [AlbumController::class, 'index'])->name('index');
        Route::get('/create', [AlbumController::class, 'create'])->name('create');
        Route::post('/store', [AlbumController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [AlbumController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AlbumController::class, 'update'])->name('update');
        Route::delete('/{id}', [AlbumController::class, 'destroy'])->name('destroy');
    });
});

// Apply 'auth' middleware on all routes related to photos
Route::middleware(['auth'])->group(function () {
    Route::prefix('foto')->name('foto.')->group(function () {
        Route::get('/', [FotoController::class, 'index'])->name('index');
        Route::get('/create', [FotoController::class, 'create'])->name('create');
        Route::post('/store', [FotoController::class, 'store'])->name('store');
        Route::get('/{id}', [FotoController::class, 'show'])->name('show');
    });

    // Route for handling photo comments
    Route::post('/komentar', [KomentarFotoController::class, 'store'])->name('komentar.store')->middleware('auth');
});

// Like photo route with 'auth' middleware
Route::post('/likefoto', [LikeFotoController::class, 'toggleLike'])->name('like.toggle')->middleware('auth');
