<ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
    <li class="inline-flex items-center">
        <a href="{{ route('home') }}">
            <x-svgs.home-path />
        </a>
    </li>
    {{ $slot }}

</ol>
