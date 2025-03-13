<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FeedbackMessage extends Component
{
    /**
     * Create a new component instance.
     */

    public string $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    public function render()
    {
        return view('components.feedback-message');
    }
}
