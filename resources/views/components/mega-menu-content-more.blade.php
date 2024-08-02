<div class="flex items-center justify-between w-full p-6 rounded shadow-card">
    <div class="flex flex-col gap-2">
        <h5 class="font-semibold">{{ $contentType }} Selengkapnya</h5>
        <p class="text-xs">Lihat selengkapnya tentang {{ Str::lower($contentType) }} kami</p>
    </div>
    <a {{ $attributes }} class="font-medium text-primary hover:underline" wire:navigate>Lihat Semua
        {{ $contentType }}</a>
</div>
