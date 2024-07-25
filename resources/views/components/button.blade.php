@php
    $classes =
        $color === 'default'
            ? 'bg-gray-800 hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:ring-gray-500'
            : "bg-$color hover:bg-$color focus:bg-$color active:bg-$color focus:ring-$color";
@endphp

<button
    {{ $attributes->merge(['type' => 'submit', 'class' => "px-4 py-2 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-base text-white dark:text-gray-800 dark:hover:bg-white dark:focus:bg-white dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 $classes"]) }}>
    {{ $slot }}
</button>
