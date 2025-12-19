<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/preview', [EmailController::class, 'preview'])->name('email.preview');
Route::post('/send', [EmailController::class, 'send'])->name('email.send');
// Add this line anywhere in routes/web.php
Route::get('/preview', function () {
    return redirect('/')->with('error', 'Please use the form to preview the email.');
});
