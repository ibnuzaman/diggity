<div class="flex flex-col justify-between gap-6 p-5 bg-white rounded-lg shadow text-start">
    <div class="space-y-6">
        <h3 class="text-2xl font-semibold">{{ $title }}</h3>
        <img src="{{ asset('asset/images/services/service-' . Str::slug($title, '-') . '.jpeg') }}" alt="card image"
            class="object-cover w-full rounded-lg h-44">
        <p>{{ $description }}</p>
    </div>
    <x-outline-button class="w-fit">
        Pelajari Selengkapnya</x-outline-button>
</div>
