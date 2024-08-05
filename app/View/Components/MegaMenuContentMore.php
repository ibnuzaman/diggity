<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MegaMenuContentMore extends Component
{
    public function __construct(
        public string $contentType
    ) {}

    public function render()
    {
        return view('components.mega-menu-content-more');
    }
}
