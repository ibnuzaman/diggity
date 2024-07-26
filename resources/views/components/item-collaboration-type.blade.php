<a {{ $attributes->merge() }} class="p-5 space-y-6 bg-white rounded-lg shadow-card text-start min-h-[550px]">
    <img src="{{ asset('asset/images/collaboration_type/icon-' . Str::slug($title, '-') . '.png') }}" alt="project based"
        class="size-24">
    <h3 class="pb-3 text-2xl font-semibold border-b">{{ $title }}</h3>
    <p>{{ $description }}</p>
    @foreach ($benefits as $benefit)
        <div class="flex items-center gap-2">
            <x-svgs.check-circle />
            <p>{{ $benefit }}</p>
        </div>
    @endforeach
</a>
