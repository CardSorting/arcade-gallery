<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GitRepositoryController;
use App\Http\Controllers\StoreListingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('games', GameController::class)->except(['store']);
    Route::post('/games', [GameController::class, 'store'])->name('games.store');
    
    Route::resource('git-repositories', GitRepositoryController::class);
    
    Route::get('/games/{game}/play/{path?}', [GameController::class, 'play'])->name('games.play');
});

// Public routes
Route::get('/explore', [StoreListingController::class, 'explore'])->name('store-listings.explore');
Route::get('/store-listings/{id}/share', [StoreListingController::class, 'share'])->name('store-listings.share');
Route::resource('store-listings', StoreListingController::class)->except(['destroy'])
    ->parameters(['store-listings' => 'id']);
Route::get('/store-listings/{id}/publish', [StoreListingController::class, 'publish'])
    ->name('store-listings.publish');

require __DIR__.'/auth.php';
