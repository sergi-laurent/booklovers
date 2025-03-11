<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('books',App\Http\Controllers\BookController::class);
Route::resource('groups',App\Http\Controllers\GroupController::class);


// Private Area -> User Pages = Wishlist and Library
Route::middleware(['auth'])->get('/library', [\App\Http\Controllers\LibraryController::class, 'index'])->name('library.index');
Route::middleware(['auth'])->post('/library/{book}', [\App\Http\Controllers\LibraryController::class, 'store'])->name('library.store');
Route::middleware(['auth'])->group(function(){
    Route::get('/wishlist', [\App\Http\Controllers\WishlistController::class, 'show'])->name('wishlist.show');
    Route::post('/wishlist/{book}', [\App\Http\Controllers\WishlistController::class, 'store'])->name('wishlist.store');



Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
