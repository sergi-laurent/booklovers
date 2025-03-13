<?php

namespace App\View\Components;

use App\Models\Book;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GeneralLibrary extends Component
{
    /**
     * Create a new component instance.
     */

    // I had a Bug where Not Logged in Users couldn't access the Book Index because the component expects a Logged in User
     
    public function __construct(public Book $book, public ?User $user) // Allow $user to be null
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.general-library');
    }
}
