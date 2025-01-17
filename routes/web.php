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
    
    // Store listing routes
    Route::prefix('games/{game}')->group(function() {
        Route::post('/store-listing', [StoreListingController::class, 'store'])
            ->name('games.store-listing');
    });
    
    Route::resource('git-repositories', GitRepositoryController::class);
    
    // Store listing routes
    Route::get('/store-listings', [StoreListingController::class, 'index'])
        ->name('store-listings.index');
    Route::get('/store-listings/{game}', [StoreListingController::class, 'show'])
        ->name('store-listings.show');
        
    Route::get('/games/{game}/play/{path?}', [GameController::class, 'play'])->name('games.play');
});

require __DIR__.'/auth.php';
