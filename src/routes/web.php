<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome'); // later: marketing page
});

// Auth routes (from Breeze)
require __DIR__.'/auth.php';

// Protected routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('links', LinkController::class)->except(['show']);

    Route::get('/links/{link}/qr', [LinkController::class, 'qr'])
        ->name('links.qr');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Public redirect
Route::get('/r/{code}', [RedirectController::class, 'handle'])
    ->name('redirect.handle');
