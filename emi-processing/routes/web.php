<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EMIController;

// Redirect root to log in form
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('loan-details', [EMIController::class, 'showLoanDetails'])->name('loan-details');
    Route::get('process-data', [EMIController::class, 'processEMIData'])->name('process-data');
});

