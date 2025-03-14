<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;
use \App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        if (!Auth::user()->is_admin)  // Not an admin
        {
            abort(401); // Unauthorized
        }
        
        //Step 1: fetch the data -> Get all the data about books
        $books = Book::paginate(10);
        $books_all_count = Book::all()->count();
        //Step 2 -> render the data
        return view('admin.books.index', ['books'=>$books, 'books_all_count'=>$books_all_count]);
    }

    public function show(Book $book)
    {
        if (!Auth::user()->is_admin)  // Not an admin
        {
            abort(401); // Unauthorized
        }

        return view('admin.books.show', ['book'=>$book]);
    }

    public function create()
    {
        if (!Auth::user()->is_admin)  // Not an admin
        {
            abort(401); // Unauthorized
        }
        
        return view('admin.books.create');
    }

    public function store(Request $request, Book $book)
    {
        if (!Auth::user()->is_admin)  // Not an admin
        {
            abort(401); // Unauthorized
        }

        $request->validate([
            'title'=>['required', 'string', 'min:10', 'max:255'],
            'summary'=>['required', 'string', 'min:10', 'max:1000'],
        ]);

        Book::create([
                'title' => $request->title,
                'summary'=> $request->summary,
                'author'=> $request->author,
            ]);   
            
        

        return redirect()->route('admin.books.index');
    }

    public function edit(Book $book)
    {
        if (!Auth::user()->is_admin)  // Not an admin
        {
            abort(401); // Unauthorized
        }

        return view('admin.books.edit', ['book'=>$book]);
    }

    public function update(Request $request, Book $book)
    {
        if (!Auth::user()->is_admin)  // Not an admin
        {
            abort(401); // Unauthorized
        }
        
        $request->validate([
            'title'=>['required', 'string', 'min:10', 'max:255'],
            'summary'=>['required', 'string', 'min:10', 'max:1000'],
            'cover' => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp', 'max:2048'],

        ]);

        $book->update([
                'title' => $request->title,
                'summary'=> $request->summary,
                'author'=> $request->author,
            ]); 
            
        if($request->has('cover')){
            $book->getMedia('cover')->each->delete();
            $book->addMediaFromRequest('cover') ->toMediaCollection('cover');
        }
        

        return redirect()->route('admin.books.show', $book);
    }

    public function destroy(Request $request, Book $book)
    {
        if (!Auth::user()->is_admin)  // Not an admin
        {
            abort(401); // Unauthorized
        }
        
        $book->delete();
            
        return redirect()->route('admin.books.index')->with('success', 'Book deleted.');;
    }

    
    
}
