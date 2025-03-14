<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;

    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class, 'book_user');
    }

    public function wishlists()
    {
        return $this->belongsToMany(Wishlist::class, 'book_wishlist');
    }

    public function getSummaryText(): string
    {
        $summary = $this->summary;
        $summary = str_replace('<p>', '<p class="mb-4 text-lg text-slate-800">', $this->summary);
        $summary = str_replace('<ul>', '<ul class="list-disc pl-4 text-lg text-slate-800 mb-4">', $this->summary);

        return $summary;
    }


}
