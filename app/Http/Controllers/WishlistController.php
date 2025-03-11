<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function show(int $wishlist)
    {
        $wishlist=Wishlist::where('id',$wishlist)->first();
        return view('site.wishlists.show', ['wishlist'=>$wishlist]);
        $wishlist_books = Auth::user()->wishlist->books;
        $user = Auth::user(); // Explicitly using Auth facade
    }
}
