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

    public function show(int $book)
    {
        //Step 1: fetch the data -> Only the book with a specific id
        $book = Book::where('id',$book)->first();
        //Step 2 -> render the data
        return view('site.books.show', ['book'=>$book]);
    }
    
}
