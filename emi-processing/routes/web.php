<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'loginController']);

// Route::get('/loans', [LoanController::class, 'index'])->middleware('auth');
// Route::post('/loans/process', [LoanController::class, 'process'])->middleware('auth');


