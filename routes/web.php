<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TopUpController;
use App\Http\Controllers\AccountController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth')  ;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/accounts/create', [AccountController::class, 'create'])
    ->name('accounts.create');

Route::post('/accounts/store', [AccountController::class, 'store'])
    ->name('accounts.store');

Route::get('/topup', [TopUpController::class, 'create'])
    ->name('topup.create');

Route::post('/topup', [TopUpController::class, 'store'])
    ->name('topup.store');


Route::middleware(['auth'])->group(function () {
    Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

