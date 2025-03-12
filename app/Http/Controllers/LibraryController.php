<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Book;
use Illuminate\Support\Facades\Auth;


class LibraryController extends Controller
{
    public function index()
    {
        //$wishlist=Wishlist::where('id',$wishlist)->first();
        $books_owned=Auth::user()->books;
        $books_count = $books_owned->count();
        return view('site.library.index', ['books_owned'=>$books_owned, 'books_count'=>$books_count]);
    }

    public function store(Request $request, Book $book)
    {
        $user = Auth::user(); // Get the logged-in user

        // Prevent duplicate entries
        if ($user->books()->where('id', $book->id)->exists()) {
            return redirect()->back()->with('message', 'This book is already in your library.');
        }

        // Attach book to user's library
        $user->books()->attach($book->id);

        return redirect()->back()->with('success', 'Book added to your library!');
    }
}
