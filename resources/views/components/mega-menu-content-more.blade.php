<div class="flex items-center justify-between w-full rounded lg:p-3 xl:p-6 shadow-card">
    <div class="flex flex-col gap-2">
        <h5 class="font-semibold paragraph">{{ $contentType }} Selengkapnya</h5>
        <p class="text-xs">Lihat selengkapnya tentang {{ Str::lower($contentType) }} kami</p>
    </div>
    <a {{ $attributes }} class="font-medium text-primary hover:underline paragraph" wire:navigate>Lihat
        Semua
        {{ $contentType }}</a>
</div>
