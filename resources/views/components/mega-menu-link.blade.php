@props(['num'])

<a {{ $attributes }} class="block p-3 space-y-6 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
    <h4 class="text-2xl font-semibold">{{ $title }}</h4>
    <p class="text-gray-500 dark:text-gray-400">{{ $description }}</p>
    <hr x-bind:class="active === {{ $num }} ? 'visible' : 'invisible'" class="mt-2 border-primary">
</a>
