<?php

use App\Http\Controllers\PublicSite\HomeController;
use App\Http\Controllers\PublicSite\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::inertia('/about', 'Public/About')->name('about');
Route::inertia('/services', 'Public/Services')->name('services.index');
Route::get('/services/{service}', ServiceController::class)->name('services.show');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
