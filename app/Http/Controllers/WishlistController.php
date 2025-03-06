<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Wishlist;

class WishlistController extends Controller
{
    public function show(int $wishlist)
    {
        $wishlist=Wishlist::where('id',$wishlist)->first();
        return view('site.wishlists.show', ['wishlist'=>$wishlist]);
    }
}
