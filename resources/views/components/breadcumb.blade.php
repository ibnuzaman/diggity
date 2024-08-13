<ol class="inline-flex items-center space-x-1 md:space-x-2">
    <li class="inline-flex items-center">
        <a href="{{ route('home') }}">
            <x-svgs.home-path class="xl:size-6 lg:size-4" />
        </a>
    </li>
    {{ $slot }}
</ol>
