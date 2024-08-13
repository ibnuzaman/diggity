<li>
    <div class="flex items-center">
        <x-svgs.arrow class="lg:size-3" />
        <a {{ $attributes }}
            class="font-semibold lg:text-sm xl:text-base ms-1 md:ms-2 dark:text-gray-400 dark:hover:text-white text-breadcumb-link">
            {{ $slot }}
        </a>
    </div>
</li>
