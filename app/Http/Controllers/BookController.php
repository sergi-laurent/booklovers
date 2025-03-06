<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        //Step 1: fetch the data -> Get all the data about books
        $books = Book::all();   
        //Step 2 -> render the data
        return view('site.books.index', ['books'=>$books]);
    }

    public function show(Book $book)
    {
        return view('site.books.show', ['book'=>$book]);
    }

    public function create()
    {
        return view('site.books.create');
    }

    public function store(Request $request, Book $book)
    {
        $request->validate([
            'title'=>['required', 'string', 'min:10', 'max:255'],
            'summary'=>['required', 'string', 'min:10', 'max:255'],
        ]);

        Book::create([
                'title' => $request->title,
                'summary'=> $request->summary,
                'author'=> $request->author,
            ]);      

        return redirect()->route('books.index');
    }

    public function edit(Book $book)
    {
        return view('site.books.edit', ['book'=>$book]);
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title'=>['required', 'string', 'min:10', 'max:255'],
            'summary'=>['required', 'string', 'min:10', 'max:255'],
        ]);

        $book->update([
                'title' => $request->title,
                'summary'=> $request->summary,
                'author'=> $request->author,
            ]);      

        return redirect()->route('books.show', $book);
    }

    public function destroy(Request $request, Book $book)
    {
        $book->delete();
            
        return redirect()->route('books.index');
    }

    
    
}
