<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TopRightButton extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(

        // <a href="{{ $route }}" class="text-center bg-purple-500 text-purple-50 uppercase p-2 hover:font-semibold rounded-4xl">{{ $text }}</a> 
        public string $route,
        public string $text,
    )
    {
     


    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.top-right-button');
    }
}
