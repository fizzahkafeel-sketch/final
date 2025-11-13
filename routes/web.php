<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController; // ✅ You need to import your controller

Route::get('/', [WebController::class, 'homePage'])->name('web-home');

Route::post('/upload-image', [WebController::class, 'uploadImage'])->name('upload-image');

Route::get('/login', function () {
    return view('login'); // ✅ "veiw" → "view"
});

Route::get('/watermark-editor', function () {
    return view('watermark-editor');
})->name('watermark.editor');

