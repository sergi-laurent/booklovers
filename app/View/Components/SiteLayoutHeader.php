<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SiteLayoutHeader extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $menu = [
            'Books' => route('books.index'),
            'Groups' => route('groups.index'),
            'Wishlist' => '/wishlists/1',
            'My Library' => route('library.index')

        ];

        return view('components.site-layout-header', compact(var_name:'menu'));
    }
}
