<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController; // ✅ You need to import your controller

Route::get('/', [WebController::class, 'homePage'])->name('web-home');

Route::get('/login', function () {
    return view('login'); // ✅ "veiw" → "view"
});
