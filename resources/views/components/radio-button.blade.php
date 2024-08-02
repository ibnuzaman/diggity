@props(['labelName'])

<div class="flex items-center">
    <input {{ $attributes }} id="{{ $labelName }}" value="{{ $labelName }}" type="radio"
        class="bg-white border-gray-900 text-primary size-4 focus:ring-primary dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label for="{{ $labelName }}" class="ms-2">{{ $labelName }}</label>
</div>
