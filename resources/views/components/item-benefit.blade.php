@if (Route::is('project-based'))
    <div class="flex flex-col items-center gap-3 p-6 bg-white rounded-md shadow-card">
        <img src="{{ asset('asset/images/collaboration_type/benefit' . $num . '-' . Route::currentRouteName() . '.png') }}"
            alt="benefit" class="size-14">
        <h2 class="font-semibold">{{ $title }}</h2>
        <p>{{ $description }}</p>
    </div>
@else
    <div class="flex items-center gap-3 p-6 bg-white rounded-md shadow-card">
        <img src="{{ asset('asset/images/collaboration_type/benefit' . $num . '-' . Route::currentRouteName() . '.png') }}"
            alt="benefit" class="size-14">
        <div class="space-y-3 text-start">
            <h2 class="font-semibold">{{ $title }}</h2>
            <p>{{ $description }}</p>
        </div>
    </div>
@endif
