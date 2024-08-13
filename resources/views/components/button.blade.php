<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'px-4 py-2 dark:bg-gray-200 border border-transparent rounded-md font-semibold lg:text-sm xl:text-base text-white dark:text-gray-800 dark:hover:bg-white dark:focus:bg-white dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 bg-primary hover:bg-primary focus:bg-primary active:bg-primary focus:ring-primary block']) }}>
    {{ $slot }}
</button>
