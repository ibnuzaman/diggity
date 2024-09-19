<div class="space-y-6 bg-white rounded-md lg:p-3.5 xl:p-6 shadow-card paragraph hover:cursor-pointer"
    x-data="{ open: false }">
    <div class="flex items-center justify-between gap-3" x-on:click="open=!open">
        <h5 class="font-medium">{{ $question }}</h5>
        <x-svgs.arrow x-bind:class="open ? '-rotate-90' : 'rotate-90'" class="transition lg:size-3" />
    </div>
    <div x-show="open">{{ $slot }}</div>
</div>
