<div class="p-6 space-y-6 bg-white rounded-md shadow-card" x-data="{ open: false }">
    <div class="flex items-center justify-between gap-3" @click="open=!open">
        <h5 class="font-medium">{{ $question }}</h5>
        <x-svgs.arrow-right x-bind:class="open ? '-rotate-90' : 'rotate-90'" />
    </div>
    <div x-show="open">{{ $slot }}</div>
</div>
