@props(['num'])

<div class="p-6 space-y-6 bg-white rounded shadow-card-secondary">
    <img src="{{ asset("asset/images/portfolio/item$num-portfolio.png") }}" alt="item portfolio"
        class="object-cover w-full h-52 rounded-xl">
    <h4 class="font-semibold">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
    </h4>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur porttitor elementum dui
        feugiat fringilla. Praesent tortor magna, dignissim eu viverra a, efficitur eget sem. Donec quis
        molestie lacus. Donec at sem sit amet magna consequat hendrerit et eu eros. In quis molestie
        risus. Nulla bibendum tempor lacus, eu elementum odio commodo sed.
    </p>
    <a {{ $attributes }} class="block" wire:navigate>
        <x-button>Lihat Selengkapnya</x-button>
    </a>
</div>
