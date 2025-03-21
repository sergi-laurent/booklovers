<?php

namespace App\View\Components;

use App\Models\Book;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BookLibraryCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Book $book, public User $user)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.book-library-card');
    }
}
