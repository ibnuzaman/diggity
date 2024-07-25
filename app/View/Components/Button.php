<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public function __construct(
        public string $color,
    ) {
    }
    public function render(): View
    {
        return view('components.button');
    }
}
