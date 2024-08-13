<button
    {{ $attributes->merge(['class' => 'flex items-center justify-between px-3 py-2 text-gray-900 rounded md:w-auto hover:bg-gray-100 md:hover:bg-transparent md:rounded-none md:border-b-2 md:px-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700 lg:text-sm xl:text-base']) }}>
    {{ $slot }}
    <x-svgs.arrow class="rotate-90 ms-2.5 lg:size-3 xl:size-4" />
</button>
