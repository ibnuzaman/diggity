<div {{ $attributes }} class="flex flex-col w-full p-3 gap-7">
    <h4 class="text-2xl font-semibold">{{ $title }}</h4>
    <div class="grid grid-cols-2 gap-y-10 gap-x-8">
        {{ $items }}
    </div>
    {{ $more }}
</div>
