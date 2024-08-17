<li>
    <div class="flex items-center lg:gap-3 xl:gap-5">
        <x-svgs.arrow class="lg:size-3" />
        <a {{ $attributes }} class="font-semibold paragraph text-breadcumb-link">
            {{ $slot }}
        </a>
    </div>
</li>
