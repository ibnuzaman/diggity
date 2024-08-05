@props(['name', 'id'])

<div class="flex items-center">
    <input {{ $attributes->merge(['class' => 'size-4 accent-primary', 'id' => $name, 'value' => $id]) }} type="radio">
    <label for="{{ $name }}" class="ms-2">{{ $name }}</label>
</div>
