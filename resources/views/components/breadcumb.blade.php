<ol class="inline-flex items-center lg:space-x-2.5 xl:space-x-5">
    <li class="inline-flex items-center">
        <a href="{{ route('home') }}">
            <x-svgs.home-path class="xl:size-6 lg:size-4" />
        </a>
    </li>
    {{ $slot }}
</ol>
