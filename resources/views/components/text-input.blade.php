@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'focus:inset-primary px-3 py-2 rounded-md shadow-sm font-normal border border-gray-300 placeholder:text-gray-200 focus:outline-primary',
]) !!}>
