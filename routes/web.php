<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// Note: Private Area Frist - Then Public Area - Explained below the Admin Area

// Private Area -> User Pages = Wishlist, Library and Group functionalities
Route::middleware(['auth'])->group(function(){

    // Books - Authenticated users can create and store books
    Route::get('/books/create', [\App\Http\Controllers\BookController::class, 'create'])->name('books.create');
    Route::post('/books', [\App\Http\Controllers\BookController::class, 'store'])->name('books.store');

    // Wishlist
    Route::get('/wishlist/{user}', [\App\Http\Controllers\WishlistController::class, 'show'])->name('wishlist.show');
    Route::post('/wishlist/{book}', [\App\Http\Controllers\WishlistController::class, 'store'])->name('wishlist.store');
    Route::delete('/wishlist/{book}', [\App\Http\Controllers\WishlistController::class, 'destroy'])->name('wishlist.destroy');

    // Library
    Route::get('/library/{user}', [\App\Http\Controllers\LibraryController::class, 'show'])->name('library.show');
    Route::post('/library/{book}', [\App\Http\Controllers\LibraryController::class, 'store'])->name('library.store');
    Route::delete('/library/{book}', [\App\Http\Controllers\LibraryController::class, 'destroy'])->name('library.destroy');

    
    Route::get('/groups/join-group', [\App\Http\Controllers\GroupMemberController::class, 'joinGroupForm'])->name('groups.joinGroupForm');
    Route::post('/groups/join-group', [\App\Http\Controllers\GroupMemberController::class, 'joinGroup'])->name('groups.joinGroup');

    // Group Actions - Resourceful except index because it's public
    Route::resource('groups', \App\Http\Controllers\GroupController::class)->except(['index','edit', 'update']);
    
    // Group Membership
    Route::get('/groups/{group}/add-member', [\App\Http\Controllers\GroupMemberController::class, 'addMemberForm'])->name('groups.addMemberForm');
    Route::post('/groups/{group}/add-member', [\App\Http\Controllers\GroupMemberController::class, 'addMember'])->name('groups.addMember');

    Route::delete('/groups/{group}/quit-group', [\App\Http\Controllers\GroupMemberController::class, 'quitGroup'])->name('groups.quitGroup');

    

    
});

// ADMIN AREA
Route::prefix('/admin')->name('admin.')->middleware(['auth'])->group(function(){

    // Admin Books - Resourceful
    Route::resource('books', App\Http\Controllers\Admin\BookController::class);

    // Admin Group - Resourceful
    Route::resource('groups', App\Http\Controllers\Admin\GroupController::class);

    // Group Actions - Not Resourceful -> Functions Don't follow the standards
    Route::get('/groups/{group}/add-member', [\App\Http\Controllers\Admin\GroupMemberController::class, 'addMemberForm'])->name('groups.addMemberForm');
    Route::post('/groups/{group}/add-member', [\App\Http\Controllers\Admin\GroupMemberController::class, 'addMember'])->name('groups.addMember');
    Route::delete('/groups/{group}/quit-group', [\App\Http\Controllers\Admin\GroupMemberController::class, 'quitGroup'])->name('groups.quitGroup');
    Route::delete('/groups/{group}/remove-member/{user}', [\App\Http\Controllers\Admin\GroupMemberController::class, 'removeMember'])->name('groups.removeMember');

});

// PUBLIC AREA
// I put the Private Routes first becase I need the Create and Store routes for Books in the Private Area (only logged in users can create and sotre a book)
// If I have the Public Area before that, then I will have the book show before /create and because of that, when accessing the url /books/create, 
//  the route for create will be expecting a parameter (caused by /books/{book} of the show route)

// Home Page Route
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Books - Public Area
Route::resource('books', \App\Http\Controllers\BookController::class)->only(['index', 'show']);


// Groups - Public Area
Route::resource('groups', \App\Http\Controllers\GroupController::class)->only(['index']);



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
