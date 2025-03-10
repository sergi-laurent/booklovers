<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index()
    {
        //$wishlist=Wishlist::where('id',$wishlist)->first();
        $books_owned=auth()->user()->books;
        return view('site.library.index', ['books_owned'=>$books_owned]);
    }
}
