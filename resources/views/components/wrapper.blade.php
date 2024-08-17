@props(['bg' => 'bg-transparent', 'isFaq' => false])

@php
    $paddings = $bg === 'bg-transparent' ? 'lg:py-24 xl:py-36' : 'lg:py-12 xl:py-24';
    $spaces = !$isFaq ? 'lg:space-y-6 xl:space-y-12' : '';
@endphp

<div {{ $attributes->merge(['class' => "$bg $paddings"]) }}>
    <div class="container mx-auto {{ $spaces }}">
        {{ $slot }}
    </div>
</div>
