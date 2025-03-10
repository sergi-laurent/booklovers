<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Book;


class LibraryController extends Controller
{
    public function index()
    {
        //$wishlist=Wishlist::where('id',$wishlist)->first();
        $books_owned=auth()->user()->books;
        return view('site.library.index', ['books_owned'=>$books_owned]);
    }

    //NOT WORKING
    public function store(Request $request, Book $book)
    {
        $user = auth()->user(); // Get the logged-in user

        // Prevent duplicate entries
        if ($user->books()->where('id', $book->id)->exists()) {
            return redirect()->back()->with('message', 'This book is already in your library.');
        }

        // Attach book to user's library
        $user->books()->attach($book->id);

        return redirect()->back()->with('success', 'Book added to your library!');
    }
}
