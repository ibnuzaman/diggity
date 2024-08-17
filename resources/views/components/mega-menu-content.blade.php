<div {{ $attributes }} class="flex flex-col w-full p-3 gap-7">
    <h3 class="heading-three">{{ $title }}</h3>
    <div class="grid grid-cols-2 lg:gap-y-5 xl:gap-y-10 lg:gap-x-4 xl:gap-x-8">
        {{ $items }}
    </div>
    {{ $more }}
</div>
