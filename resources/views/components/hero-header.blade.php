<div class="container grid grid-cols-2 gap-24 mx-auto">
    <div class="flex flex-col justify-center gap-12">
        <h1 class="text-4xl font-semibold">{{ $type }}
        </h1>
        <p>{{ $description }}</p>
        <x-button :href="route('contact-us')" class="w-fit">Hubungi Kami</x-button>
    </div>
    <img {{ $attributes }} alt="header" class="object-cover w-full h-96 rounded-3xl">
</div>
