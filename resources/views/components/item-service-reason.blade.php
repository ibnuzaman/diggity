<div class="p-6 rounded bg-secondary shadow-card-secondary">
    <img src="{{ asset("asset/images/services/service-icon-$num.png") }}" alt="card image" class="lg:size-12 xl:size-20">
    <h3 class="mt-3 font-semibold lg:text-sm xl:text-base">{{ $title }}</h3>
    <p class="mt-6 lg:text-sm xl:text-base">{{ $slot }}</p>
</div>
