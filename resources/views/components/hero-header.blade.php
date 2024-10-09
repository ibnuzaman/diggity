<div class="container grid grid-cols-2 gap-24 mx-auto">
    <div class="flex flex-col justify-center lg:gap-8 xl:gap-12">
        <h1 class="font-semibold heading-one">
            {{ $type }}
        </h1>
        <p class="paragraph">{{ $description }}</p>
        <a href="{{ route('contact-us') }}" class="w-fit" wire:navigate>
            <x-button>Hubungi Kami</x-button>
        </a>
    </div>
    <img {{ $attributes }} class="object-cover w-full lg:h-80 xl:h-96 rounded-3xl">
</div>
