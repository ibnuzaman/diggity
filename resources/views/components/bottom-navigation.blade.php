<div class="flex justify-between">
    <div class="flex flex-col gap-6">
        <p class="text-xl font-semibold text-accent">Previous</p>
        <a href={{ route(Str::slug($prev, '-')) }} wire:navigate>
            <div class="flex items-center gap-6">
                <div class="flex items-center justify-center border-4 border-gray-900 rounded-full size-10">
                    <x-svgs.arrow-right class="rotate-180" />
                </div>
                <h2 class="text-3xl font-semibold">{{ $prev }}</h2>
            </div>
        </a>
    </div>
    <div class="flex flex-col gap-6">
        <p class="text-xl font-semibold text-accent text-end">Next</p>
        <a href={{ route(Str::slug($next, '-')) }} wire:navigate>
            <div class="flex flex-row-reverse items-center gap-6">
                <div class="flex items-center justify-center border-4 border-gray-900 rounded-full size-10">
                    <x-svgs.arrow-right />
                </div>
                <h2 class="text-3xl font-semibold">{{ $next }}</h2>
            </div>
        </a>
    </div>
</div>
