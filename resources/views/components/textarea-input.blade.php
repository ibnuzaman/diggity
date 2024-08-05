@props(['error' => null])

@php
    $border = $error ? 'border-red-600' : 'border-gray-300';
@endphp

<textarea
    {{ $attributes->merge(['class' => "block p-2.5 w-full text-base font-normal text-gray-900 bg-white rounded-md border active:outline-primary focus:outline-primary $border"]) }}
    rows="8"></textarea>
