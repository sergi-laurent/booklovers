<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class LibraryController extends Controller
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
        
        $books_owned=$user->books;
        $books_count = $books_owned->count();
        return view('site.library.show', ['user'=>$user, 'books_owned'=>$books_owned, 'books_count'=>$books_count]);
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

    public function destroy(Request $request, Book $book)
    {
        $request->user()->books()->detach($book->id); // Detach the book from the library
        
        
        return redirect()->route('library.show', Auth::user())->with('success', 'Book removed from library.');
    }

}
