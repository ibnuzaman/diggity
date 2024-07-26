<li>
    <div class="flex items-center">
        <x-svgs.arrow-right />
        <a {{ $attributes->merge() }}
            class="text-base font-semibold ms-1 hover:text-breadcumb-link md:ms-2 dark:text-gray-400 dark:hover:text-white text-breadcumb-link">{{ $slot }}</a>
    </div>
</li>
