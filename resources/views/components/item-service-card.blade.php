<div class="flex flex-col justify-between p-5 bg-white rounded-lg shadow lg:gap-3 xl:gap-6 text-start">
    <div class="lg:space-y-3 xl:space-y-6">
        <h3 class="heading-three">{{ $title }}</h3>
        <img src="{{ asset('asset/images/services/service-' . Str::slug($title, '-') . '.jpeg') }}" alt="card image"
            class="object-cover w-full rounded-lg h-44">
        <p class="paragraph">{{ $description }}</p>
    </div>
    <x-outline-button class="w-fit">
        Pelajari Selengkapnya
    </x-outline-button>
</div>
