@props(['num'])

<a {{ $attributes }}
    class="block p-3 rounded-lg lg:space-y-3 xl:space-y-6 hover:bg-gray-100 dark:hover:bg-gray-700 hover:cursor-pointer">
    <h4 class="font-semibold lg:text-lg xl:text-2xl">{{ $title }}</h4>
    <p class="text-gray-500 dark:text-gray-400 lg:text-sm xl:text-base">{{ $description }}</p>
    <hr x-bind:class="active === {{ $num }} ? 'visible' : 'invisible'" class="mt-2 border-primary">
</a>
