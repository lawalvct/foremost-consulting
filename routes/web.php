<?php

use App\Http\Controllers\PublicSite\ContactController;
use App\Http\Controllers\PublicSite\HomeController;
use App\Http\Controllers\PublicSite\IndustryController;
use App\Http\Controllers\PublicSite\ServiceController;
use App\Http\Controllers\PublicSite\TrainingController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::inertia('/about', 'Public/About')->name('about');
Route::inertia('/services', 'Public/Services')->name('services.index');
Route::get('/services/{service}', ServiceController::class)->name('services.show');
Route::inertia('/industries', 'Public/Industries')->name('industries.index');
Route::get('/industries/{industry}', IndustryController::class)->name('industries.show');
Route::inertia('/training', 'Public/Training')->name('training.index');
Route::get('/training/{trainingProgram}', TrainingController::class)->name('training.show');
Route::inertia('/insights', 'Public/Insights')->name('insights.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.store');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
