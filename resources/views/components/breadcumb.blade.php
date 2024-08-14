<ol class="inline-flex items-center">
    <li class="inline-flex items-center lg:me-2.5 xl:me-5">
        <a href="{{ route('home') }}">
            <x-svgs.home-path class="xl:size-6 lg:size-4" />
        </a>
    </li>
    {{ $slot }}
</ol>
