@props(['error' => null])

@php
    $border = $error ? 'border-red-600' : 'border-gray-300';
@endphp

<select
    {{ $attributes->merge(['class' => "bg-white border font-normal block text-gray-900 rounded-lg focus:outline-primary active:outline-primary w-full p-2.5 focus:border-primary $border"]) }}>
    <option value="" selected>{{ $first }}</option>
    {{ $slot }}
</select>
