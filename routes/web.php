<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profil', [ProfileController::class, 'index']);
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
});

Route::get('/', [ListingController::class, 'index']);
Route::resource('listings', ListingController::class)->middleware('auth');
Route::post('/listings/{listing}/images', [ListingController::class, 'updateImages'])
    ->middleware('auth')->name('listings.images.update');
Route::delete('/listings/images/{image}', [ListingController::class, 'deleteImage'])
    ->middleware('auth')->name('listings.images.delete');
Route::resource('users', UserController::class);
Route::post('/listings/{id}/favorite', [ListingController::class, 'toggleFavorite'])
    ->middleware('auth')
    ->name('listings.favorite');

require __DIR__.'/auth.php';
