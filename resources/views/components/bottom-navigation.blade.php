<div class="flex justify-between">
    <div class="flex flex-col lg:gap-4 xl:gap-6">
        <p class="font-semibold lg:text-base xl:text-xl text-accent">Previous</p>
        <a href={{ route(Str::slug($prev, '-')) }} wire:navigate>
            <div class="flex items-center lg:gap-4 xl:gap-6">
                <div
                    class="flex items-center justify-center border-gray-900 rounded-full lg:border-2 xl:border-4 lg:size-7 xl:size-10">
                    <x-svgs.arrow class="rotate-180 lg:size-3" />
                </div>
                <h2 class="font-semibold lg:text-xl xl:text-3xl">{{ $prev }}</h2>
            </div>
        </a>
    </div>
    <div class="flex flex-col lg:gap-4 xl:gap-6">
        <p class="font-semibold lg:text-base xl:text-xl text-accent text-end">Next</p>
        <a href={{ route(Str::slug($next, '-')) }} wire:navigate>
            <div class="flex flex-row-reverse items-center lg:gap-4 xl:gap-6">
                <div
                    class="flex items-center justify-center border-gray-900 rounded-full lg:border-2 xl:border-4 lg:size-7 xl:size-10">
                    <x-svgs.arrow class="lg:size-3" />
                </div>
                <h2 class="font-semibold lg:text-xl xl:text-3xl">{{ $next }}</h2>
            </div>
        </a>
    </div>
</div>
