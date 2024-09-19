@props(['num'])

<div class="p-6 rounded bg-secondary shadow-card-secondary paragraph">
    <img src="{{ asset("asset/images/services/service-icon-$num.png") }}" alt="card image" class="lg:size-12 xl:size-20">
    <h3 class="mt-3 font-semibold">{{ $title }}</h3>
    <p class="mt-6">{{ $slot }}</p>
</div>
