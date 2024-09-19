<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class ItemCollaborationType extends Component
{
    public function __construct(
        public string $title,
        public string $description,
        public array $benefits,
    ) {}

    public function render(): View
    {
        return view('components.item-collaboration-type');
    }
}
