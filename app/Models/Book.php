<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class Book extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;
    use InteractsWithMedia;

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

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
              ->width(368)
              ->height(232)
              ->sharpen(10);

        $this->addMediaConversion('poster')
                ->nonQueued()
                ->width(600)
                ->height(800)
                ->sharpen(10);
    }


}
