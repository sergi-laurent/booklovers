<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use \App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function show(User $user)
    {

        if (
            $user->id !== Auth::user()->id && // Not the same user
            !Auth::user()->is_admin && // Not an admin
            !Auth::user()->groups->pluck('id')->intersect($user->groups->pluck('id'))->isNotEmpty() // No shared groups
        ) {
            abort(401); // Unauthorized
        }

        $wishlist = $user->wishlist->load('books');
        //$wishlist = Auth::user()->wishlist->load('books');
        $wishlist_books = $wishlist->books;
        $book_count = $wishlist_books->count();

        return view('site.wishlists.show', [
            'user' => $user,
            'wishlist_books' => $wishlist_books,
            'book_count' => $book_count
        ]);
    }

    public function store(Book $book)
    {
        $user = Auth::user(); // Explicitly using Auth facade

        // Retrieve the user's wishlist
        $wishlist = $user->wishlist()->first();

        // Prevent duplicate entries
        if ($user->wishlist->books()->where('book_id', $book->id)->exists()) {
            return redirect()->back()->with('message', 'This book is already in your wishlist.');
        }

        // Attach book to user's library
        $user->wishlist->books()->attach($book->id);

        return redirect()->back()->with('success', 'Book added to your wishlist!');
    }

    /* Chat-GPT prompt to adapt a destroy to a Many to Many Relationship
        How do I create the destroy function to remove a book from the wishlist 
        (wishlist and books have a many to many relationship)
    */

    public function destroy(Request $request, Book $book)
    {
        $wishlist = $request->user()->wishlist; // Get the user's wishlist

        if ($wishlist) {
            $wishlist->books()->detach($book->id); // Detach the book from the wishlist
        }

        return redirect()->route('wishlist.show', Auth::user())->with('success', 'Book removed from wishlist.');
    }
}
