<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AuthController;

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes (require authentication)
Route::middleware(['auth'])->group(function () {
    Route::get('/', [WebController::class, 'homePage'])->name('web-home');
    Route::post('/upload-image', [WebController::class, 'uploadImage'])->name('upload-image');
    Route::get('/watermark-editor', function () {
        return view('web.watermarkeditor');
    })->name('watermark.editor');
    Route::get('/download-image', function () {
        return view('web.download');
    })->name('download.image');
});

// Public Routes
Route::get('/about', function () {
    return view('web.about');
})->name('about');

