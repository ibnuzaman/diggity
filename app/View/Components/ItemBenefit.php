<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class ItemBenefit extends Component
{
    public function __construct(
        public int $num,
        public string $title,
        public string $description,
    ) {
    }
    public function render()
    {
        return view('components.item-benefit');
    }
}
