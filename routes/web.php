<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController; // ✅ You need to import your controller

Route::get('/', [WebController::class, 'homePage'])->name('web-home');

Route::post('/upload-image', [WebController::class, 'uploadImage'])->name('upload-image');

Route::get('/login', function () {
    return view('login'); // ✅ "veiw" → "view"
})->name('login');

Route::get('/watermark-editor', function () {
    return view('web.watermarkeditor');
})->name('watermark.editor');

Route::get('/about', function () {
    return view('web.about');
})->name('about');
