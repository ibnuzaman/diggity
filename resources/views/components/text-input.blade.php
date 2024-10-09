@props(['disabled' => false, 'error' => null])

@php
    $border = $error ? 'border-red-600' : 'border-gray-300';
@endphp

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => "focus:inset-primary px-3 py-2 rounded-md shadow-sm font-normal border placeholder:text-gray-200 focus:outline-primary $border",
]) !!}>
