<div class="flex justify-between">
    <div class="flex flex-col lg:gap-4 xl:gap-6">
        <h4 class="heading-four text-accent">Previous</h4>
        <a href={{ route(Str::slug($prev, '-')) }} wire:navigate>
            <div class="flex items-center lg:gap-4 xl:gap-6">
                <div
                    class="flex items-center justify-center border-gray-900 rounded-full lg:border-2 xl:border-4 lg:size-7 xl:size-10">
                    <x-svgs.arrow class="rotate-180 lg:size-3" />
                </div>
                <h2 class="font-semibold heading-two">{{ $prev }}</h2>
            </div>
        </a>
    </div>
    <div class="flex flex-col lg:gap-4 xl:gap-6">
        <h4 class="heading-four text-accent text-end">Next</h4>
        <a href={{ route(Str::slug($next, '-')) }} wire:navigate>
            <div class="flex flex-row-reverse items-center lg:gap-4 xl:gap-6">
                <div
                    class="flex items-center justify-center border-gray-900 rounded-full lg:border-2 xl:border-4 lg:size-7 xl:size-10">
                    <x-svgs.arrow class="lg:size-3" />
                </div>
                <h2 class="font-semibold heading-two">{{ $next }}</h2>
            </div>
        </a>
    </div>
</div>
