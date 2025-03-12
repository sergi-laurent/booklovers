<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use \App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function show()
    {

        $wishlist = Auth::user()->wishlist->load('books'); // Eager load books
        $wishlist_books = $wishlist->books;
        $book_count = $wishlist_books->count(); // Count without extra query

        return view('site.wishlists.show', [
            'wishlist_books' => $wishlist_books,
            'book_count' => $book_count
        ]);
    }

    public function store(Book $book)
    {
        $user = Auth::user(); // Explicitly using Auth facade

        // Prevent duplicate entries
        if ($user->wishlist->books()->where('book_id', $book->id)->exists()) {
            return redirect()->back()->with('message', 'This book is already in your wishlist.');
        }

        // Attach book to user's library
        $user->wishlist->books()->attach($book->id);

        return redirect()->back()->with('success', 'Book added to your wishlist!');
    }
}
