<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.app')] class extends Component {
    public string $id;
}; ?>

<div>
    <p>{{ $id }}</p>
</div>
