<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class MegaMenuContentItem extends Component
{
    public function __construct(
        public string $title,
        public string $description,
    ) {
    }
    
    public function render(): View
    {
        return view('components.mega-menu-content-item');
    }
}
