<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Create and store routes go first than the show because if I have the show route first, 
// then the route for create will be expecting a parameter
Route::middleware(['auth'])->group(function(){
    Route::get('/books/create', [\App\Http\Controllers\BookController::class, 'create'])->name('books.create');
    Route::post('/books', [\App\Http\Controllers\BookController::class, 'store'])->name('books.store');
});

Route::get('/books', [\App\Http\Controllers\BookController::class, 'index'])->name('books.index');
Route::get('/books/{book}', [\App\Http\Controllers\BookController::class, 'show'])->name('books.show');



Route::get('/groups',[\App\Http\Controllers\GroupController::class, 'index'])->name('groups.index');


// Private Area -> User Pages = Wishlist and Library and Group functionalities
Route::middleware(['auth'])->group(function(){
    Route::get('/wishlist/{user}', [\App\Http\Controllers\WishlistController::class, 'show'])->name('wishlist.show');
    Route::post('/wishlist/{book}', [\App\Http\Controllers\WishlistController::class, 'store'])->name('wishlist.store');
    Route::delete('/wishlist/{book}', [\App\Http\Controllers\WishlistController::class, 'destroy'])->name('wishlist.destroy');

    Route::get('/library/{user}', [\App\Http\Controllers\LibraryController::class, 'show'])->name('library.show');
    Route::post('/library/{book}', [\App\Http\Controllers\LibraryController::class, 'store'])->name('library.store');
    Route::delete('/library/{book}', [\App\Http\Controllers\LibraryController::class, 'destroy'])->name('library.destroy');


    Route::get('/groups/create',[\App\Http\Controllers\GroupController::class, 'create'])->name('groups.create');
    
    Route::get('/groups/{group}/add-member', [\App\Http\Controllers\GroupMemberController::class, 'addMemberForm'])->name('groups.addMemberForm');
    Route::post('/groups/{group}/add-member', [\App\Http\Controllers\GroupMemberController::class, 'addMember'])->name('groups.addMember');
    Route::delete('/groups/{group}/quit-group', [\App\Http\Controllers\GroupMemberController::class, 'quitGroup'])->name('groups.quitGroup');


    Route::get('/groups/join-group', [\App\Http\Controllers\GroupMemberController::class, 'joinGroupForm'])->name('groups.joinGroupForm');
    Route::post('/groups/join-group', [\App\Http\Controllers\GroupMemberController::class, 'joinGroup'])->name('groups.joinGroup');
    Route::get('/groups/{group}',[\App\Http\Controllers\GroupController::class, 'show'])->name('groups.show');

    Route::post('/groups',[\App\Http\Controllers\GroupController::class, 'store'])->name('groups.store');
    Route::get('/groups/{group}/edit',[\App\Http\Controllers\GroupController::class, 'edit'])->name('groups.edit');
    Route::put('/groups/{group}',[\App\Http\Controllers\GroupController::class, 'update'])->name('groups.update');
    Route::delete('/groups/{group}',[\App\Http\Controllers\GroupController::class, 'destroy'])->name('groups.destroy');


    
    Route::resource('books', App\Http\Controllers\Admin\BookController::class);
});



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
